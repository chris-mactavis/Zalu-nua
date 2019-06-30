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
if (env('APP_ENV') === 'production') {
	URL::forceScheme('https');
}

Route::get('/', [
	'uses' => 'HomePageController@falsehome',
	'as' => 'falsehome'
]);
Route::get('/home', function () {
	return Hash::make('winners');
});
// Route::get('/home', [
// 	'uses' => 'HomePageController@index',
// 	'as' => 'home'
// ]);


Route::get('/articles/index', [
	'uses' => 'HomePageController@articles',
	'as' => 'articles.index'
]);

Route::get('/articles/view', [
	'uses' => 'HomePageController@view_articles',
	'as' => 'articles.view'
]);

Route::get('/contact', [
	'uses' => 'StaticPagesController@contact',
	'as' => 'contact'
]);
Route::post('/submitform', [
	'uses' => 'StaticPagesController@submitform',
	'as' => 'submitform'
]);


Route::get('/about', [
	'uses' => 'StaticPagesController@about',
	'as' => 'about'
]);

Route::get('/page/{page_url}', [
	'uses' => 'StaticPagesController@page',
	'as' => 'page'
]);


Route::get('/products/', [
	'uses' => 'ProductsController@index',
	'as' => 'products.index'
]);

Route::get('/store/{deparment_url}', [
	'uses' => 'ProductsController@stores',
	'as' => 'products.department'
]);

Route::get('/store/{department_url}/{category_url}/{category_id}', [
	'uses' => 'ProductsController@category',
	'as' => 'products.category'
]);

Route::get('/products/view/single/{slug}', [
	'uses' => 'ProductsController@view',
	'as' => 'products.view'
]);

Route::get('/sale/', [
	'uses' => 'ProductsController@sale',
	'as' => 'products.sale'
]);


Route::get('/search', [
	'uses' => 'ProductsController@search',
	'as' => 'search'
]);

Route::get('/cart/', [
	'uses' => 'CartController@index',
	'as' => 'cart'
]);

Route::post('/cart/add', [
	'uses' => 'CartController@add',
	'as' => 'cart.add'
]);

Route::get('/cart/delete/{id}', [
	'uses' => 'CartController@delete',
	'as' => 'cart.delete'
]);

Route::post('/cart/update', [
	'uses' => 'CartController@update',
	'as' => 'cart.update'
]);

Route::get('/cart/incr/{id}/{qty}', [
	'uses' => 'CartController@incr',
	'as' => 'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}', [
	'uses' => 'CartController@decr',
	'as' => 'cart.decr'
]);

Route::get('/cart /dest ro y', [
	'uses '  => 'CartController@destroy',
	'as' => 'cart.destroy'
]);

R oute: :g et('40 4 ',['a s'  =>'404 ','use s' =>'ErrorHandlerController@errorCode404']);

R oute ::g et('40  5',['a s ' =>'4 05','u se s'=>'ErrorHandlerController@errorCode405']);

Route::get('5 00',[ 'a s'=>'5 00','u se s'=>'ErrorHandlerController@errorC ode500']);

Auth::routes();

Route::group(['prefix' => 'user', 'middleware' => 'auth'], func tion() {

	Route::get('/account/', [
		'uses' => 'UsersController@index',
		'as' => 'user.account'
	]);

	Route::get('/account/edit', [
		'uses' => 'UsersController@edit',
		'as' => 'user.edit'
	]);

	Route::get('/account/orders', [
		'uses' => 'UsersController@orders',
		'as' => 'user.orders'
	]);

	Route::get('/account/orders/details/{id}', [
		'uses' => 'UsersController@order_details',
		'as' => 'user.order_details'
	]);

	Route::get('/confirm_checkout', [
		'uses' => 'CheckoutController@index',
		'as' => 'checkout.index'
	]);

	Route::get('/delivery', [
		'uses' => 'CheckoutController@delivery',
		'as' => 'checkout.delivery'
	]);

	Route::post('/checkout', [
		'uses' => 'CheckoutController@docheckout',
		'as' => 'checkout.docheckout'
	]);

	Route::post('/checkout/dotransfer', [
		'uses' => 'CheckoutController@dotransfer',
		'as' => 'checkout.dotransfer'
	]);

	Route::get('/checkout/transfer', [
		'uses' => 'CheckoutController@transfer',
		'as' => 'checkout.transfer'
	]);

	Route::get('/checkout/pay/{userinfo_id}', [
		'uses' => 'CheckoutController@pay',
		'as' => 'checkout.pay'
	]);


	Route::post('/checkout/pay', [
		'uses' => 'CheckoutController@redirectToGateway',
		'as' => 'checkout.makepayment'
	]);

	Route::get('/checkout/callback', [
		'uses' => 'CheckoutController@handleGatewayCallback',
		'as' => 'checkout.callback'
	]);

	Route::get('/checkout/thankyou', [
		'uses' => 'CheckoutController@thankyou',
		'as' => 'checkout.thankyou'
	]);
});



Route::get('/welcome', 'HomeController@index')->name('welcome');
