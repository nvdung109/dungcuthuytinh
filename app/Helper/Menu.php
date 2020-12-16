<?php
namespace App\Helper;

use App\Repositories\MenuRepository as Model;
use Request;
class Menu
{
    public static $arrPosition  = [1 => 'Menu Header', 2 => 'Menu Footer'];
    public static $arrTarget    = ["_self" => "Cùng cửa sổ", "_blank" => "New window"];
    public static $menu         = [];

   public function __construct(){

   }

    public static function getPictureUrl($filename, $type = 'fullsize'){
        $url        = Upload::getUrlImage('menu', $filename);
        return $url;
    }

   public static function getAllMenu($where = [], $group = true){

        $menu               = new Model;
        $data               = $menu->getAll($where);

        $arrayMenu  = [];
        foreach ($data as $key => $value) {
            $arrayMenu[$value['mnu_parent_id']][$value['mnu_id']]           =  $value;
            $arrayMenu[$value['mnu_parent_id']][$value['mnu_id']]["count"]  =  '';
        }

        self::sortLevel($arrayMenu, 0);

        $dataReturn = [];
        if($group == true){
            $arrPosition    = self::$arrPosition;
            foreach (self::$menu as $key => $value) {
                if(isset($arrPosition[$value['mnu_position']])){
                    if(!isset($dataReturn[$value['mnu_position']])) $dataReturn[$value['mnu_position']] = [];
                    $dataReturn[$value['mnu_position']][$key]   = $value;
                }
            }
        }else{
            $dataReturn     = self::$menu;
        }

        return $dataReturn;
   }

    public static function sortLevel($arrayMenu,$keystart=0,$level=-1){

        //kiểm tra xem tồn tại record không
        if(array_key_exists($keystart, $arrayMenu)){
            $level++;
            foreach($arrayMenu[$keystart] as $key=>$value){

                //gán các phần tử cho array menu sắp xếp theo đúng vị trí
                self::$menu[$value['mnu_id']]           = $value;

                //gan level cho menu
                self::$menu[$value['mnu_id']]['level']  = $level;
                //thiet lap de biet day la` 1 nut cha
                if(array_key_exists($key, $arrayMenu)){
                    self::$menu[$value['mnu_id']]["parent"] = 1;
                }else{
                    self::$menu[$value['mnu_id']]["parent"] = 0;
                }

                //de quy de lap lai, neu menu_id man trong array cac menu cha
                self::sortLevel($arrayMenu,$key,$level);
            }
        }

    }

    public static function getMenuView($dataMenu){

        $htmlMenu           = '';
        $htmlMenuMobile     = '';
        $hasChild           = false;
        $level              = 0;
        $dataShow           = [];

        foreach($dataMenu as $key => $value){

            if($value['level'] > 1) $value['level'] = 1;

            $ur_add         = "";
            $ur_add_mobile  = "";
            $classParent    = "";
            $linkParent     = $value['mnu_link'];

            if($value['level'] == 0){
                if($key > 0){
                    if($hasChild){
                        $htmlMenu       .= '</ul>';
                        $htmlMenuMobile .= '</ul>';
                    }
                    $htmlMenu       .= '</li>';
                    $htmlMenuMobile .= '</li>';
                }

                if($value['parent'] > 0){

                    $ur_add         = '<ul class="sub_menu">';
                    $ur_add_mobile  = '<ul class="drawer-dropdown-menu">';
                    $classParent    = 'class="drawer-dropdown"';
                    $hasChild   = true;
                    $linkParent = 'javascript:;';
                }else{
                    $hasChild   = false;
                }

                $htmlMenu           .= '<li><a class="" href="' . $value['mnu_link'] . '">' . translateData(app()->getLocale(), $value['mnu_name']) . '</a>' . $ur_add;
                $htmlMenuMobile     .= '<li ' . $classParent . '><a class="drawer-dropdown-menu-item" href="' . $linkParent . '">' . translateData(app()->getLocale(), $value['mnu_name']) . '<span class="drawer-caret"></span></a>' . $ur_add_mobile;
            }else{
                $htmlMenu           .= '<li><a href="' . $value['mnu_link'] . '" title="' . translateData(app()->getLocale(), $value['mnu_name']) . '">' . translateData(app()->getLocale(), $value['mnu_name']) . '</a></li>';
                $htmlMenuMobile     .= '<li><a class="drawer-menu-item" href="' . $value['mnu_link'] . '" title="' . translateData(app()->getLocale(), $value['mnu_name']) . '">' . translateData(app()->getLocale(), $value['mnu_name']) . '</a></li>';
            }
            $level  = $value['level'];
        }

        if($hasChild && $level > 0){
            $htmlMenu       .= '</ul>';
            $htmlMenuMobile .= '</ul>';
        }
        if(count($dataMenu) > 0){
            $htmlMenu           .= '</li>';
            $htmlMenuMobile     .= '</li>';
        }

        $dataShow = [
            'menuDesktop'   => $htmlMenu,
            'menuMobile'    => $htmlMenuMobile
        ];

        return $dataShow;
    }
}
