<?php
Route::get('/', 'Admin\AdminController@viewPage')->name('admin.index');
// Product
Route::get('product', 'Admin\ProductController@productlist')->name('product');
Route::get('product/add', 'Admin\ProductController@addProduct')->name('product.add');
Route::post('product/add', 'Admin\ProductController@saveAddProduct');
Route::get('product/edit/{id}', 'Admin\ProductController@editProduct')->name('product.edit');
Route::post('product/edit/{id}', 'Admin\ProductController@saveEditProduct');
Route::get('product/remove/{id}', 'Admin\ProductController@destroy')->name('product.remove');
//Category
Route::get('category', 'Admin\CategoryController@listCategory')->name('category');
Route::get('category/add', 'Admin\CategoryController@addCategory')->name('category.add');
Route::post('category/add', 'Admin\CategoryController@saveAddCategory');
Route::get('category/edit/{id}', 'Admin\CategoryController@editCategory')->name('category.edit');
Route::post('category/edit/{id}', 'Admin\CategoryController@saveEditCategory');
Route::get('category/remove/{id}', 'Admin\CategoryController@destroy')->name('category.remove');
//user
Route::get('user', 'Admin\UserController@listUser')->name('user');
Route::get('user/add', 'Admin\UserController@addUser')->name('user.add');
Route::post('user/add', 'Admin\UserController@saveAddUser');
Route::get('user/edit/{id}', 'Admin\UserController@editUser')->name('user.edit');
Route::post('user/edit/{id}', 'Admin\UserController@saveEditUser');
Route::get('user/remove/{id}', 'Admin\UserController@destroy')->name('user.remove');
//Brand
Route::get('brand', 'Admin\BrandController@listBrand')->name('brand');
Route::get('brand/add', 'Admin\BrandController@addBrand')->name('brand.add');
Route::post('brand/add', 'Admin\BrandController@saveAddBrand');
Route::get('brand/edit/{id}', 'Admin\BrandController@editBrand')->name('brand.edit');
Route::post('brand/edit/{id}', 'Admin\BrandController@saveEditBrand');
Route::get('brand/remove/{id}', 'Admin\BrandController@destroy')->name('brand.remove');
//news
Route::get('news', 'Admin\NewController@listNew')->name('news');
Route::get('news/add', 'Admin\NewController@addNew')->name('news.add');
Route::post('news/add', 'Admin\NewController@saveAddNew');
Route::get('news/edit/{id}', 'Admin\NewController@editNew')->name('news.edit');
Route::post('news/edit/{id}', 'Admin\NewController@saveEditNew');
Route::get('news/remove/{id}', 'Admin\NewController@destroy')->name('news.remove');
//news Category
Route::get('cate_news', 'Admin\NewCategoryController@listNewCategory')->name('cate_news');
Route::get('cate_news/add', 'Admin\NewCategoryController@addCateNew')->name('cate_news.add');
Route::post('cate_news/add', 'Admin\NewCategoryController@saveAddCateNew');
Route::get('cate_news/edit/{id}', 'Admin\NewCategoryController@editCateNew')->name('cate_news.edit');
Route::post('cate_news/edit/{id}', 'Admin\NewCategoryController@saveEditCateNew');
Route::get('cate_news/remove/{id}', 'Admin\NewCategoryController@destroy')->name('cate_news.remove');
//Comment
Route::get('comment', 'Admin\CommentController@listComment')->name('comment');
Route::get('comment/add', 'Admin\CommentController@addComment')->name('comment.add');
Route::post('comment/add', 'Admin\CommentController@saveAddComment');
Route::get('comment/remove/{id}', 'Admin\CommentController@destroy')->name('comment.remove');
//Contact
Route::get('contact', 'Admin\ContactController@listContact')->name('contact');
Route::get('contact/add', 'Admin\ContactController@addContact')->name('contact.add');
Route::post('contact/add', 'Admin\ContactController@saveAddContact');
Route::get('contact/remove/{id}', 'Admin\ContactController@destroy')->name('contact.remove');
//Setting
Route::get('setting', 'Admin\WebSettingController@listSetting')->name('setting');
Route::get('setting/add', 'Admin\WebSettingController@addSetting')->name('setting.add');
Route::post('setting/add', 'Admin\WebSettingController@saveAddSetting');
Route::get('setting/edit/{id}', 'Admin\WebSettingController@editSetting')->name('setting.edit');
Route::post('setting/edit/{id}', 'Admin\WebSettingController@saveEditSetting');
Route::get('setting/remove/{id}', 'Admin\WebSettingController@destroy')->name('setting.remove');
//Slider
Route::get('slider', 'Admin\SliderController@listSlide')->name('slider');
Route::get('slider/add', 'Admin\SliderController@addSlide')->name('slider.add');
Route::post('slider/add', 'Admin\SliderController@saveAddSlide');
Route::get('slider/edit/{id}', 'Admin\SliderController@editSlide')->name('slider.edit');
Route::post('slider/edit/{id}', 'Admin\SliderController@saveEditSlide');
Route::get('slider/remove/{id}', 'Admin\SliderController@destroy')->name('slider.remove');
//Partner
Route::get('partner', 'Admin\PartnerController@listPartner')->name('partner');
Route::get('partner/add', 'Admin\PartnerController@addPartner')->name('partner.add');
Route::post('partner/add', 'Admin\PartnerController@saveAddPartner');
Route::get('partner/edit/{id}', 'Admin\PartnerController@editPartner')->name('partner.edit');
Route::post('partner/edit/{id}', 'Admin\PartnerController@saveEditPartner');
Route::get('partner/remove/{id}', 'Admin\PartnerController@destroy')->name('partner.remove');
//banner
Route::get('banner', 'Admin\BannerController@listBanner')->name('banner');
Route::get('banner/add', 'Admin\BannerController@addBanner')->name('banner.add');
Route::post('banner/add', 'Admin\BannerController@saveAddBanner');
Route::get('banner/edit/{id}', 'Admin\BannerController@editBanner')->name('banner.edit');
Route::post('banner/edit/{id}', 'Admin\BannerController@saveEditBanner');
Route::get('banner/remove/{id}', 'Admin\BannerController@destroy')->name('banner.remove');
//Menu
Route::get('/menu', 'Admin\MenuController@index')->name('menu');
Route::any('/menu_add/{id?}', 'Admin\MenuController@add')->name('menu_add')->where('id', '[0-9]+');
Route::any('/menu_delete/{id?}', 'Admin\MenuController@delete')->name('menu_delete')->where('id', '[0-9]+');
Route::post('/menu-status', 'Admin\MenuController@status')->name('menu_status');
//Page
Route::get('page', 'Admin\PageController@listPage')->name('page');
Route::get('page/add', 'Admin\PageController@addPage')->name('page.add');
Route::post('page/add', 'Admin\PageController@saveAddPage');
Route::get('page/edit/{id}', 'Admin\PageController@editPage')->name('page.edit');
Route::post('page/edit/{id}', 'Admin\PageController@saveEditPage');
Route::get('page/remove/{id}', 'Admin\PageController@destroy')->name('page.remove');
?>