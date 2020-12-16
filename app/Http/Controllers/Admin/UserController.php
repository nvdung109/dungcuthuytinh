<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
  public function listUser(Request $request){
   	    $kw = $request->keyword;
        $user = new User();
        if($kw != "") $user = $user->where('name', 'like', "%$kw%");
        $user = $user->get();
   	return view('admin.user.index', ['listUser' => $user]);
   }
   public function addUser(){
    	$user = User::all();
        return view('admin.user.add-user', compact('user'));
    }
    public function saveAddUser(AddUserRequest $request){
    	$user = new User;
    	$user->fill($request->all());
        if ($request->hasFile('avatar')) {
		    $path = $request->file('avatar')
		            ->storeAs('public/users', $request->avatar->getClientOriginalName());
		    $user->avatar = $request->avatar->getClientOriginalName();
		}
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.user')->with('message', "Thêm mới thành công");
    }
    public function editUser($id){
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user');
         }
        return view('admin.user.edit-user', compact('user'));
    }
    public function saveEditUser(EditUserRequest $request) {
         $user = User::find($request->id);
         $user->fill($request->all());

          if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->storeAs('public/users', $request->avatar->getClientOriginalName());
                $user->avatar = $request->avatar->getClientOriginalName();
            }
        $user->save();
        return redirect(route('admin.user'))->with('message', "Sửa thành công");
    }
    public function destroy($id)
    {
        $user = User::find($id);
        // dd( $User);
        $user->delete();
        // dd( $User->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.user');
    }
}
