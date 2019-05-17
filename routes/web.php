<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//shop trang suc
Route::get('admin', 'AdminController@loginView');
Route::get('admin/login', 'AdminController@loginView');
Route::post('admin/login','AdminController@login');
Route::get('admin/logout','AdminController@logout');

Route::post('admin/getotp','AdminController@getotp');

Route::group([ 'prefix' => 'admin', 'middleware'=>'adminLogin' ] , function() {
	Route::get('category', 'AdminController@getAllCategories');
	Route::group([ 'prefix' => 'category' ] , function() {
		Route::get('create', 'AdminController@createCategoryView');
		Route::post('createPost', 'AdminController@createCategory');

		Route::get('edit/{Id}', 'AdminController@editCategoryView');
		Route::post('editPost', 'AdminController@editCategory');

		Route::post('delete', 'AdminController@deleteCategory');

		Route::post('uploadImage', 'AdminController@uploadCategoryImage');
	});


	Route::get('product', 'AdminController@getAllProducts');
	Route::group([ 'prefix' => 'product' ] , function() {
		Route::get('create', 'AdminController@createProductView');
		Route::post('createPost', 'AdminController@createProduct');

		Route::get('edit/{Id}', 'AdminController@editProductView');
		Route::post('editPost', 'AdminController@editProduct');

		Route::post('delete', 'AdminController@deleteProduct');

		Route::post('uploadImage', 'AdminController@uploadProductImage');
		Route::post('deleteImage', 'AdminController@deleteProductImage');

		Route::post('search', 'AdminController@searchProduct');

	});

	Route::get('order', 'AdminController@getAllOrders');
	Route::group([ 'prefix' => 'order' ] , function() {
		Route::post('search', 'AdminController@searchOrder');
		Route::get('detail/{Id}', 'AdminController@orderDetailView');
		Route::post('edit', 'AdminController@editOrder');

		Route::post('viewRemindOrder', 'AdminController@viewRemindOrder');
		Route::post('sendEmailRemindOrder', 'AdminController@sendEmailRemindOrder');
		Route::post('viewExpiredOrder', 'AdminController@viewExpiredOrder');


		//export
		Route::post('exportOrder', 'AdminController@exportOrder');

	});

	Route::get('user', 'AdminController@getAllUsers');
	Route::group([ 'prefix' => 'user' ] , function() {
		Route::get('edit/{Id}', 'AdminController@editUserView');
		Route::post('editPost/{Id}', 'AdminController@editUserPost');

		Route::post('changePasswordPost/{Id}', 'AdminController@changePasswordPost');
		Route::post('search', 'AdminController@searchUser');
	});

	Route::get('blog', 'AdminController@getAllBlogs');
	Route::group([ 'prefix' => 'blog' ] , function() {
		Route::get('create', 'AdminController@createBlogView');
		Route::post('createPost', 'AdminController@createBlog');

		Route::get('edit/{Id}', 'AdminController@editBlogView');
		Route::post('editPost', 'AdminController@editBlog');

		Route::post('delete', 'AdminController@deleteBlog');

		Route::post('uploadImage', 'AdminController@uploadProductImage');
		Route::post('deleteImage', 'AdminController@deleteProductImage');

		Route::post('search', 'AdminController@searchBlog');

	});

	Route::get('topic', 'AdminController@getAllTopics');
	Route::group([ 'prefix' => 'topic' ] , function() {
		Route::get('create', 'AdminController@createTopicView');
		Route::post('createPost', 'AdminController@createTopic');

		Route::get('edit/{Id}', 'AdminController@editTopicView');
		Route::post('editPost', 'AdminController@editTopic');

		Route::post('delete', 'AdminController@deleteTopic');

		Route::post('uploadImage', 'AdminController@uploadProductImage');
		Route::post('deleteImage', 'AdminController@deleteProductImage');
	});

		Route::get('advisory', 'SettingController@getAdvisoryView');
		Route::post('advisory', 'SettingController@getAdvisoryPost');


});
Route::get('/', 'HomeController@page02');
Route::get('danh-muc/{Alias}/{Id}', 'HomeController@categoryView');


Route::get('san-pham/{Alias}/{Id}', 'HomeController@product_detail');
Route::get('cart', 'HomeController@cart');

Route::post('checkoutPost', 'HomeController@checkoutPost');

Route::post('filterProducts', 'HomeController@filterProducts');
Route::post('seeMoreProducts', 'HomeController@seeMoreProducts');

Route::post('addToCart', 'HomeController@addToCart');
Route::post('plusItem', 'HomeController@plusItem');
Route::post('minusItem', 'HomeController@minusItem');
Route::post('removeItem', 'HomeController@removeItem');

Route::post('login', 'HomeController@loginPage');
Route::post('logout', 'HomeController@logoutPage');
Route::post('createUser', 'UserController@createUser');
Route::post('sendEmailResetPassword','UserController@sendEmailResetPassword');
Route::post('saveLichSuTraCuu','UserController@saveLichSuTraCuu');

Route::get('reset-password/{token}','UserController@resetPasswordPageGet');
Route::post('resetPasswordPagePost','UserController@resetPasswordPagePost');

Route::post('addToWishList', 'HomeController@addToWishList');

Route::post('getPhongThuy', 'HomeController@getPhongThuy');

Route::get('user', 'UserController@getAll');
Route::group([ 'prefix' => 'user' ] , function() {
	Route::get('orders', 'UserController@ordersView');
	Route::post('getOrders', 'UserController@getOrders');
	Route::get('order-detail/{orderId}', 'UserController@getOrderDetail');
	Route::get('wish-list', 'UserController@getWishList');
	Route::post('filterWishList', 'UserController@filterWishList');

	Route::get('profile', 'UserController@getProfile');
	Route::post('updateUser', 'UserController@updateUser');
	Route::post('changePassWord', 'UserController@changePassWord');



	// Route::post('create', 'UserController@create');

	// Route::get('edit/{Id}', 'UserController@editView');
	// Route::post('edit/{Id}', 'UserController@edit');

	// Route::post('changePassWordAdmin/{Id}', 'UserController@changePassWordAdmin');
	// Route::post('search', 'UserController@searchUser');

});

Route::get('about-us','IntroController@aboutUs');
Route::get('shipping-policy','IntroController@shippingPolicy');
Route::get('guarantee-policy','IntroController@guaranteePolicy');
Route::get('jewellery-care','IntroController@jewelleryCare');

Route::get('order/{orderCode}', 'UserController@getOrderDetailByCode');

Route::get('thank-you', 'HomeController@thankYouPage');

Route::get('filter/{tag}', 'HomeController@filterPage');

Route::get('blog', 'HomeController@blogView');
Route::get('blog/{Alias}/{Id}', 'HomeController@blogDetailView');

//Index page
Route::post('getHotProducts', 'HomeController@getHotProducts');
