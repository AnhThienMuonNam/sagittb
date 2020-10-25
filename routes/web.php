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

Route::get(config('constants.ADMIN_PREFIX'), 'AdminController@loginView');
Route::get(config('constants.ADMIN_PREFIX') . '/login', 'AdminController@loginView');
Route::post(config('constants.ADMIN_PREFIX') . '/login', 'AdminController@login');
Route::get(config('constants.ADMIN_PREFIX') . '/logout', 'AdminController@logout');

Route::post('sa/getotp', 'AdminController@getotp');

Route::group(['prefix' => 'sa', 'middleware' => ['adminLogin']], function () {
	Route::post('uploadImage', 'SettingController@uploadSingleImage');
	Route::post('deleteImage', 'SettingController@deleteSingleImage');

	Route::get('advisory', 'SettingController@getAdvisoryView');
	Route::post('advisory', 'SettingController@getAdvisoryPost');

	Route::group(['prefix' => 'category'], function () {
		Route::get('', 'Admin_CategoryController@getAllCategories');

		Route::get('create', 'Admin_CategoryController@createCategoryView');
		Route::post('createPost', 'Admin_CategoryController@createCategory');

		Route::get('/{Id}', 'Admin_CategoryController@editCategoryView');
		Route::post('editPost', 'Admin_CategoryController@editCategory');

		Route::post('delete', 'Admin_CategoryController@deleteCategory');
	});

	Route::group(['prefix' => 'product'], function () {
		Route::get('', 'Admin_ProductController@getAllProducts');

		Route::get('create', 'Admin_ProductController@createProductView');
		Route::post('createPost', 'Admin_ProductController@createProduct');

		Route::get('/{Id}', 'Admin_ProductController@editProductView');
		Route::post('editPost', 'Admin_ProductController@editProduct');

		Route::post('delete', 'Admin_ProductController@deleteProduct');
		Route::post('search', 'Admin_ProductController@searchProduct');
	});

	Route::group(['prefix' => 'order'], function () {
		Route::get('', 'Admin_OrderController@getAllOrders');

		Route::get('create', 'Admin_OrderController@createOrderView');
		Route::post('createPost', 'Admin_OrderController@createOrder');

		Route::post('search', 'Admin_OrderController@searchOrder');
		Route::get('/{Id}', 'Admin_OrderController@orderDetailView');
		Route::post('edit', 'Admin_OrderController@editOrder');

		Route::post('viewRemindOrder', 'Admin_OrderController@viewRemindOrder');
		Route::post('sendEmailRemindOrder', 'Admin_OrderController@sendEmailRemindOrder');
		Route::post('viewExpiredOrder', 'Admin_OrderController@viewExpiredOrder');

		Route::post('exportOrder', 'Admin_OrderController@exportOrder');
	});

	Route::group(['prefix' => 'account'], function () {
		Route::get('', 'Admin_AccountController@getAllUsers');

		Route::get('create', 'Admin_AccountController@createUserView');
		Route::post('createPost', 'Admin_AccountController@createUser');

		Route::get('/{Id}', 'Admin_AccountController@editUserView');
		Route::post('editPost', 'Admin_AccountController@editUserPost');

		Route::post('changePasswordPost/{Id}', 'Admin_AccountController@changePasswordPost');
		Route::post('search', 'Admin_AccountController@searchUser');
	});

	Route::group(['prefix' => 'permissions'], function () {
		Route::get('', 'Admin_AccountController@getAllPermissions');
		Route::post('editPost', 'Admin_AccountController@editPermissionsPost');
	});

	Route::group(['prefix' => 'blog'], function () {
		Route::get('', 'Admin_BlogController@getAllBlogs');

		Route::get('create', 'Admin_BlogController@createBlogView');
		Route::post('createPost', 'Admin_BlogController@createBlog');

		Route::get('/{Id}', 'Admin_BlogController@editBlogView');
		Route::post('editPost', 'Admin_BlogController@editBlog');

		Route::post('delete', 'Admin_BlogController@deleteBlog');

		Route::post('search', 'Admin_BlogController@searchBlog');
	});

	Route::group(['prefix' => 'topic'], function () {
		Route::get('', 'Admin_TopicController@getAllTopics');

		Route::get('create', 'Admin_TopicController@createTopicView');
		Route::post('createPost', 'Admin_TopicController@createTopic');

		Route::get('edit/{Id}', 'Admin_TopicController@editTopicView');
		Route::post('editPost', 'Admin_TopicController@editTopic');

		Route::post('delete', 'Admin_TopicController@deleteTopic');
	});

	Route::group(['prefix' => 'piece'], function () {
		Route::get('', 'SettingController@getAllPieces');

		Route::post('createPost', 'SettingController@createPiece');
		Route::post('editPost', 'SettingController@editPiece');
		Route::post('delete', 'SettingController@deletePiece');
	});

	Route::group(['prefix' => 'charm'], function () {
		Route::get('', 'SettingController@getAllCharms');

		Route::post('createPost', 'SettingController@createCharm');
		Route::post('editPost', 'SettingController@editCharm');
		Route::post('delete', 'SettingController@deleteCharm');
	});
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
Route::post('sendEmailResetPassword', 'UserController@sendEmailResetPassword');
Route::post('saveLichSuTraCuu', 'UserController@saveLichSuTraCuu');

Route::get('reset-password/{token}', 'UserController@resetPasswordPageGet');
Route::post('resetPasswordPagePost', 'UserController@resetPasswordPagePost');

Route::post('addToWishList', 'HomeController@addToWishList');

Route::post('getPhongThuy', 'HomeController@getPhongThuy');

Route::get('user', 'UserController@getAll');
Route::group(['prefix' => 'user'], function () {
	Route::get('orders', 'UserController@ordersView');
	Route::post('getOrders', 'UserController@getOrders');
	Route::get('order-detail/{orderId}', 'UserController@getOrderDetail');
	Route::get('wish-list', 'UserController@getWishList');
	Route::post('filterWishList', 'UserController@filterWishList');

	Route::get('profile', 'UserController@getProfile');
	Route::post('updateUser', 'UserController@updateUser');
	Route::post('changePassWord', 'UserController@changePassWord');
});

Route::get('about-us', 'IntroController@aboutUs');
Route::get('shipping-policy', 'IntroController@shippingPolicy');
Route::get('guarantee-policy', 'IntroController@guaranteePolicy');
Route::get('jewellery-care', 'IntroController@jewelleryCare');

Route::get('order/{orderCode}', 'UserController@getOrderDetailByCode');

Route::get('thank-you', 'HomeController@thankYouPage');

Route::get('filter/{tag}', 'HomeController@filterPage');

Route::get('blog', 'HomeController@blogView');
Route::get('blog/{Alias}/{Id}', 'HomeController@blogDetailView');

//Index page
Route::post('getProductsIndex', 'HomeController@getProductsIndex');
Route::post('getInstagram', 'HomeController@getInstagram');
