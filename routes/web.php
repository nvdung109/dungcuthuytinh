<?php
Route::get('search', 'Page\HomeController@getSearch')->name('search');
Route::get('/', 'Page\HomeController@getListIndex')->name('index');
Route::get('dung-cu-thuy-tinh', 'Page\HomeController@getListProduct')->name('sanpham');
Route::get('danh-muc/{link}/{id}', 'Page\HomeController@getCategory')->name('loaisp');
Route::get('san-pham/{url}', 'Page\HomeController@getDetail')->name('chitietsp');
Route::post('comment-product/{id}', 'Page\HomeController@postComment');
Route::post('comment-news/{id}', 'Page\HomeController@postCommentNews');
Route::get('trang/{id}', 'Page\HomeController@detailPage')->name('page');
Route::get('lien-he', 'Page\HomeController@lienhe')->name('lienhe');
Route::get('gop-y/add', 'Page\HomeController@addContact')->name('gopy.add');
Route::post('gop-y/add', 'Page\HomeController@saveContact');
Route::get('tin-tuc', 'Page\HomeController@getListNews')->name('tintuc');
Route::get('danh-muc-tin-tuc/{id}', 'Page\HomeController@getCateNews')->name('danhmuctintuc');
Route::get('tin-tuc/{url}', 'Page\HomeController@getDetailNews')->name('chitiettintuc');
Route::get('add-to-cart/{id}', 'Page\CartController@addCart')->name('addcart');
Route::get('del-cart/{id}', 'Page\CartController@removeCart')->name('delcart');
Route::get('giohang', function () {
    return view('frontend.giohang');
});
Route::get('admin/login', 'Admin\AuthController@login')->name('admin.login');
Route::post('admin/login', 'Admin\AuthController@postLogin');
Route::get('admin/logout', 'Admin\AuthController@logout')->name('admin.logout');

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
	require_once 'admin.php';
});



