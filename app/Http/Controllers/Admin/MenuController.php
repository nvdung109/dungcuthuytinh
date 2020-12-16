<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu as MenuModel;
use App\Repositories\MenuRepository;
use App\Helper\Menu as MenuHelper;
use Config;

class MenuController extends Controller
{
   public $menu_repository;
    public $menu_helper;
    public function __construct(MenuRepository $menu_repository, MenuHelper $menu_helper){
        $this->menu_repository  = $menu_repository;
        $this->menu_helper      = $menu_helper;
    }

    public function index(Request $request){

        $name       = $request->input('name');
        $position   = intval($request->input('position'));

        $dataSearch = ['name' => $name, 'position' => $position];

        $where      = [];
        if($name != '') $where[]    = ['mnu_name', 'like', '%' . $name . '%'];
        if($position > 0) $where[]  = ['mnu_position', '=', $position];

        $menus          = $this->menu_helper::getAllMenu($where, false);
        $arrPosition    = $this->menu_helper::$arrPosition;
        $arrTarget      = $this->menu_helper::$arrTarget;

        return  view('admin.menu.index', [
                                        'menus'     => $menus,
                                        'arrPosition'   => $arrPosition,
                                        'arrTarget'     => $arrTarget,
                                        'dataSearch'=> $dataSearch
                                        ]
                                    );

   }

   public function add(Request $request, $id = 0){

        $redirect   = $request->input('url_redirect', base64_encode(route('admin.menu')));
        $name       = '';
        $link       = '';
        $icon       = '';
        $position   = $request->input('position', 0);
        $target     = '';
        $parent_id  = 0;
        $order      = 0;
        $active     = 0;
        $id         = intval($id);

        if($id > 0){
            // Lấy thông tin
            $info = $this->menu_repository->getById($id);
            if(empty($info)) die('Record not found !');

            $name       = $info->mnu_name;
            $link       = $info->mnu_link;
            $icon       = $info->mnu_icon;
            $position   = $info->mnu_position;
            $target     = $info->mnu_target;
            $parent_id  = $info->mnu_parent_id;
            $order      = $info->mnu_order;
            $active     = $info->mnu_active;
        }

        $name       = $request->input('name', $name);
        $link       = $request->input('link', $link);
        $icon       = $request->input('icon', $icon);
        $position   = $request->input('position', $position);
        $target     = $request->input('target', $target);
        $parent_id  = $request->input('parent_id', $parent_id);
        $order      = $request->input('order', $order);

        $data = [
                    'id'        => $id,
                    'link'      => $link,
                    'name'      => $name,
                    'icon'      => $icon,
                    'target'    => $target,
                    'position'  => $position,
                    'parent_id' => $parent_id,
                    'order'     => $order,
                    'active'    => $active,
                ];

        $allMenu    = [];
        if($position > 0) $temp = $this->menu_helper::getAllMenu([['mnu_position', '=', $position]]);

        if(isset($temp) && isset($temp[$position])) $allMenu    = $temp[$position];

        $arrPosition    = $this->menu_helper::$arrPosition;
        $arrTarget      = $this->menu_helper::$arrTarget;

        $action         = $request->input('action');
        $errors         = [];

        if($action == 'execute'){

            $data['active']     = $request->input('active', 0);
            $dataReturn = $this->menu_repository->add($id, $data);

            if(isset($dataReturn['status']) && $dataReturn['status'] == true){
                return redirect(base64_decode($redirect));
            }
            $errors = isset($dataReturn['errors']) ? $dataReturn['errors'] : [];
        }


        return  view('admin.menu.add-menu', [
                                        'data'          => $data,
                                        'allMenu'       => $allMenu,
                                        'arrPosition'   => $arrPosition,
                                        'arrTarget'     => $arrTarget,
                                        'errors'        => $errors
                                        ]
                                    );
   }

   public function delete(Request $request, $id){
    $redirect = $request->input('url_redirect', base64_encode(route('admin.menu')));

    // Gọi function xóa
    $result = $this->menu_repository->delete($id);
    if(isset($result['status']) && $result['status'] == true){
        echo '<script>alert("Delete menu success"); window.location.href="' . base64_decode($redirect) . '"</script>';
    }else{
        $error = isset($result['msg']) ? $result['msg'] : '';
        echo '<script>alert("Delelte Error: ' . $error . '"); window.location.href="' . base64_decode($redirect) . '"</script>';
    }
   }


    public function status(Request $request){
        $redirect   = $request->input('url_redirect', base64_encode(route('adminmenu')));
        $record_id  = $request->input('record_id', 0);
        $type       = $request->input('type', '');

        // Lấy thông tin
        $info = $this->menu_repository->getById($record_id);
        if(empty($info)) return response()->json(array('status'=> false, 'msg'=> 'Record not found'), 200);

        $dataUpdate     = [];
        switch ($type) {
            case 'hot':
                $status     = abs($info->mnu_hot - 1);
                $dataUpdate['hot'] = $status;
                break;

            case 'active':
                $status     = abs($info->mnu_active - 1);
                $dataUpdate['active'] = $status;
                break;
        }

        if($dataUpdate){
            $dataReturn = $this->menu_repository->add($record_id, $dataUpdate);

            if(isset($dataReturn['status']) && $dataReturn['status'] == true){
                return response()->json(array('status'=> true, 'data' => $status), 200);
            }

            $errors = isset($dataReturn['errors']) ? implode(",", $dataReturn['errors']) : '';
        }else{
            $errors = 'Type update not found';
        }

        return response()->json(array('status'=> false, 'msg'=> $errors), 200);
    }
}
