<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddPageRequest;
use App\Http\Requests\EditPageRequest;

class PageController extends Controller
{
    public function listPage(Request $request){
        $kw = $request->keyword;
        $pag = new Page();
        if($kw != "")$pag = $pag->where('name', 'like', "%$kw%");
        $pag = $pag->get();
    	return view('admin.page.index', [ 'listPage' => $pag ]);
    }
    public function addPage(){
    	$pag = Page::all();
    	return view('admin.page.add-page', compact('pag'));
    }
    public function saveAddPage(AddPageRequest $request){
    	$pag = new Page;
    	$pag->fill($request->all());
        $pag->save();
        return redirect()->route('admin.page')->with('message', "Thêm thành công");
    }
    public function editPage($id){
        $pag = Page::find($id);
        if (!$pag) {
            return redirect()->route('page');
         }
    	return view('admin.page.edit-page', compact('pag'));
    }
    public function saveEditPage(EditPageRequest $request) {
         $pag = Page::find($request->id);
         $pag->fill($request->all());
        $pag->save();
        return redirect(route('admin.page'))->with('message', "Sửa thành công");
    }
    public function destroy($id)
    {
        $pag = Page::find($id);
        // dd( $product);
        $pag->delete();
        // dd( $product->delete());
        return redirect()->route('admin.page')->with('message', "Xóa thành công");
    }
}
