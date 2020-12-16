<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function listContact(Request $request){
    	$kw = $request->keyword;
        $ct = new Contact();
        if($kw != "")$ct = $ct->where('name', 'like', "%$kw%");
        $ct = $ct->get();
    	return view('admin.contact.index', ['listContact' => $ct]);
    }
    public function addContact(){
    	$ct = Contact::all();
    	return view('admin.contact.add-contact', compact('ct'));
    }
    public function saveAddContact(Request $request){
    	$ct = new Contact;
    	$ct->fill($request->all());
    	$ct->save();
    	return redirect()->route('admin.contact');
    }
    public function destroy($id){
    	$ct = Contact::find($id);
    	$ct->delete();
    	return redirect()->route('admin.contact')->with('message', "Xóa thành công");
    }
}
