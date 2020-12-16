<?php
namespace App\Repositories;

use App\Models\Menu as Model;
use App\Repositories\Repository;
use App\Helper\Menu as MenuHelper;
use Illuminate\Support\Facades\DB;

class MenuRepository extends Repository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    public function getAll($where = []){
    	$category 		= $this->model->where('mnu_id', '>' , '0');
    	foreach ($where as $key => $value) {
    		$category = $category->where($value[0], $value[1], $value[2]);
    	}
    	$category		= $category->orderBy('mnu_order', 'ASC')
									->orderBy('mnu_id', 'ASC')
									->get();

		return $category;
    }

    public function addPrefix($data)
    {
        $dataStore = [];
        foreach ($data as $key => $value) {
            $dataStore[$this->model->prefix . $key] = $value;
        }
        return $dataStore;
    }


    public function getById($id){
        return $this->model->find($id);
    }

    public function delete($menuId){
    	$dataReturn = ['status' => false, 'msg' => ''];
    	$menu 		= $this->getById($menuId);
    	if($menu){
			$menu->delete();
			$dataReturn['status'] 	= true;
    	}else{
    		$dataReturn['msg'] 	= "Menu not found !";
    	}

    	return $dataReturn;
    }

    public function add($id, $data){

    	$dataReturn = ['status' => false, 'data' => false, "errors" => []];

    	// Tạo validate
    	$this->inputFields 	= [
									'name'			=> ['string'],
									'link'			=> ['string'],
									'parent_id'		=> ['integer'],
									'position'		=> ['integer'],
									'target'		=> ['string'],
									'scroll'		=> ['string'],
									'order'			=> ['integer'],
									'active'		=> ['integer'],
									'hot'			=> ['integer'],
									'create_time'	=> ['integer'],
									'update_at'	=> ['integer'],
									'staff_id'		=> ['integer']
									];

    	$rulesValidate 	= [
									'name'		=> 'required',
									'link'		=> 'bail|required|',
									'position'	=> 'bail|required|in:' . implode(",", array_keys(MenuHelper::$arrPosition)),
									'target'		=> 'bail|required|in:' . implode(",", array_keys(MenuHelper::$arrTarget)),
									'active'		=> 'in:0,1',
									];

		if(isset($data['parent_id']) && $data['parent_id'] > 0) $rulesValidate['parent_id'] 	= 'exists:menus,mnu_id';

		if($id > 0){
			if(empty($data['name'])) unset($rulesValidate['name']);
			if(empty($data['link'])) unset($rulesValidate['link']);
			if(empty($data['position'])) unset($rulesValidate['position']);
			if(empty($data['target'])) unset($rulesValidate['target']);
			if(empty($data['active'])) unset($rulesValidate['active']);
		}else{
			$data['create_time'] = time();
		}
		$data['update_at'] = time();

		$this->rulesValidate 	= $rulesValidate;
    	$this->messagesValidate = [
									'parent_id.exists' => 'Menu cha không tồn tại'
									];

		$return				= false;
		// Có cần reset all child không
		$checkResetAllChild	= false;
		$whereReset 			= [];

		$this->data = $data;
		// Gọi validate
		$dataValidate 	= $this->validate();

		// Không có lỗi
		if($dataValidate){
			if($id > 0){
	    		$menu = $this->getById($id);
	    		if(empty($menu)){
	    			$dataReturn['errors'][] = 'Record not found';
	    		}else{
	    			$mnu_parent_id_old 	= $menu->mnu_parent_id;
	    			$return = $menu->update($this->addPrefix($dataValidate));
	    			if($return){
	    				$dataReturn['status'] = true;
		    			$dataReturn['data'] = $menu;
		    			// Có thay đổi danh mục cha thì cần reset all child
	    				if(isset($dataValidate['parent_id']) && $mnu_parent_id_old != $dataValidate['parent_id']){
	    					$whereReset[] 		= ['mnu_position', '=', $menu->mnu_position];
	    					$checkResetAllChild = true;
	    				}
		    		}else{
		    			$dataReturn['errors'][] = 'System error. Try again';
		    		}
	    		}
	    	}else{
				$menu	= $this->model;
				$return	= $menu->create($this->addPrefix($dataValidate));
	    		if(isset($return->mnu_id) && $return->mnu_id > 0){
					$dataReturn['status']	= true;
					$dataReturn['data']		= $return;
					$checkResetAllChild		= true;
					if(isset($data['position'])) $whereReset[] 		= ['mnu_position', '=', $data['position']];
	    		}else{
	    			$dataReturn['errors'][] = 'System error. Try again';
	    		}
	    	}
		}else{
			$dataReturn['errors'] 	= $this->errors();
		}

		if($checkResetAllChild){
			$this->resetAllChild();
		}

		return $dataReturn;
    }

    public function resetAllChild($where = []){
		$arrayMenu	= MenuHelper::getAllMenu($where, false);
		$arrayMenu	= array_values($arrayMenu);

		// Lặp từ trên xuống dưới để lấy các cat con( dựa vào level)
		for($i = 0; $i < count($arrayMenu); $i++) {
			$listid	= $arrayMenu[$i]['id']; // Lấy id của chính nó
			// Lặp các danh mục tiếp theo nếu level của danh mục tiếp theo lớn hơn thì đấy chính là cấp con
			$mnu_has_child = 0;
			for($j = $i + 1; $j < count($arrayMenu); $j++) {
				if($arrayMenu[$j]['level'] > $arrayMenu[$i]['level']){
					$listid	.= ", " . $arrayMenu[$j]['id'];
					$mnu_has_child = 1;
				}else{
					// Đã hết cấp con
					break;
				}
			}
			$listid	= convertListToListId($listid, 1);

			// Cập nhật database
			DB::table('menus')->where('mnu_id', intval($arrayMenu[$i]['id']))->update(['mnu_has_child' => 1, 'mnu_all_child' => $listid]);
		}
	}
}
