<?php

Route::group(['namespace' => 'Admin'], function () {

    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');


    Route::get('home', [
        'uses' => 'HomeController@home',
        'as' => 'admin.home'
    ]);

    //adminusers
    Route::get('/managers', [
        'uses' => 'AdminUsersController@index',
        'as' => 'admin.managers.index'
    ]);

    Route::get('/managers/create', [
        'uses' => 'AdminUsersController@create',
        'as' => 'admin.managers.create'
    ]);

    Route::post('/managers/store', [
        'uses' => 'AdminUsersController@store',
        'as' => 'admin.managers.store'
    ]);

    Route::get('/managers/edit', [
        'uses' => 'AdminUsersController@edit',
        'as' => 'admin.managers.edit'
    ]);

    Route::get('/managers/delete', [
        'uses' => 'AdminUsersController@delete',
        'as' => 'admin.managers.delete'
    ]);

    Route::post('/managers/destroy', [
        'uses' => 'AdminUsersController@destroy',
        'as' => 'admin.managers.destroy'
    ]);



    //settings
    Route::get('/settings', [
        'uses' => 'AdminSettingsController@index',
        'as' => 'admin.settings'
    ]);

    Route::post('/settings/store', [
        'uses' => 'AdminSettingsController@store',
        'as' => 'admin.settings.store'
    ]);


    Route::get('/settings/edit', [
        'uses' => 'AdminSettingsController@edit',
        'as' => 'admin.settings.edit'
    ]);

    Route::post('/settings/update/{id}', [
        'uses' => 'AdminSettingsController@update',
        'as' => 'admin.settings.update'
    ]);

    Route::get('/settings/setup', [
        'uses' => 'AdminSettingsController@setup',
        'as' => 'admin.settings.setup'
    ]);





    //sliders
    Route::get('/sliders/', [
        'uses' => 'AdminSlidersController@index',
        'as' => 'admin.sliders.index'
    ]);

    Route::get('/sliders/add', [
        'uses' => 'AdminSlidersController@addslider',
        'as' => 'admin.sliders.add'
    ]);

    Route::post('/sliders/store', [
        'uses' => 'AdminSlidersController@store',
        'as' => 'admin.sliders.store'
    ]);

    Route::get('/sliders/edit/{id}', [
        'uses' => 'AdminSlidersController@editslider',
        'as' => 'admin.sliders.edit'
    ]);

    Route::post('/sliders/update/{id}', [
        'uses' => 'AdminSlidersController@updateslider',
        'as' => 'admin.sliders.update'
    ]);

    Route::get('/sliders/delete/{id}', [
        'uses' => 'AdminSlidersController@deleteslider',
        'as' => 'admin.sliders.delete'
    ]);

    Route::post('/sliders/destroy/{id}', [
        'uses' => 'AdminSlidersController@destroy',
        'as' => 'admin.sliders.destroy'
    ]);

    //Stores (Departments) Routes
    Route::get('/departments/', [
        'uses' => 'AdminDepartmentsController@index',
        'as' => 'admin.departments.index'
    ]);

    Route::get('/departments/create', [
        'uses' => 'AdminDepartmentsController@create',
        'as' => 'admin.departments.create'
    ]);

    Route::post('/departments/store', [
        'uses' => 'AdminDepartmentsController@store',
        'as' => 'admin.departments.store'
    ]);

    Route::get('/departments/edit/{id}', [
        'uses' => 'AdminDepartmentsController@edit',
        'as' => 'admin.departments.edit'
    ]);

    Route::post('/departments/update/{id}', [
        'uses' => 'AdminDepartmentsController@update',
        'as' => 'admin.departments.update'
    ]);

    Route::get('/departments/delete/{id}', [
        'uses' => 'AdminDepartmentsController@delete',
        'as' => 'admin.departments.delete'
    ]);

    Route::post('/departments/destroy/{id}', [
        'uses' => 'AdminDepartmentsController@destroy',
        'as' => 'admin.departments.destroy'
    ]);

    //Categories Routes
    Route::get('/categories/', [
        'uses' => 'AdminCategoriesController@index',
        'as' => 'admin.categories.index'
    ]);

    Route::get('/categories/create', [
        'uses' => 'AdminCategoriesController@create',
        'as' => 'admin.categories.create'
    ]);

    Route::post('/categories/store', [
        'uses' => 'AdminCategoriesController@store',
        'as' => 'admin.categories.store'
    ]);

    Route::get('/categories/edit/{id}', [
        'uses' => 'AdminCategoriesController@edit',
        'as' => 'admin.categories.edit'
    ]);

    Route::post('/categories/update/{id}', [
        'uses' => 'AdminCategoriesController@update',
        'as' => 'admin.categories.update'
    ]);

    Route::get('/categories/delete/{id}', [
        'uses' => 'AdminCategoriesController@destroy',
        'as' => 'admin.categories.delete'
    ]);

    Route::post('/categories/destroy/{id}', [
        'uses' => 'AdminCategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);

    //Products Routes
    Route::get('/products/', [
        'uses' => 'AdminProductsController@index',
        'as' => 'admin.products.index'
    ]);

    Route::get('/products/create', [
        'uses' => 'AdminProductsController@create',
        'as' => 'admin.products.create'
    ]);

    Route::post('/products/store', [
        'uses' => 'AdminProductsController@store',
        'as' => 'admin.products.store'
    ]);

    Route::get('/products/view/{id}', [
        'uses' => 'AdminProductsController@view',
        'as' => 'admin.products.view'
    ]);

    Route::get('/products/edit/{id}', [
        'uses' => 'AdminProductsController@edit',
        'as' => 'admin.products.edit'
    ]);

    Route::post('/products/update/{id}', [
        'uses' => 'AdminProductsController@update',
        'as' => 'admin.products.update'
    ]);

    Route::get('/products/product_gallery/view/{product_id}', [
        'uses' => 'AdminProductsController@view_gallery',
        'as' => 'admin.products.view_gallery'
    ]);

    Route::post('/products/product_gallery/add/{product_id}', [
        'uses' => 'AdminProductsController@add_gallery',
        'as' => 'admin.products.add_gallery'
    ]);

    Route::get('/products/product_gallery/remove/{product_id}/{id}', [
        'uses' => 'AdminProductsController@remove_gallery',
        'as' => 'admin.products.remove_gallery'
    ]);

    Route::get('/products/orders/{id}', [
        'uses' => 'AdminProductsController@orders',
        'as' => 'admin.products.orders'
    ]);

    Route::get('/products/delete/{id}', [
        'uses' => 'AdminProductsController@delete',
        'as' => 'admin.products.delete'
    ]);

    Route::post('/products/destroy/{id}', [
        'uses' => 'AdminProductsController@destroy',
        'as' => 'admin.products.destroy'
    ]);

    //customers
    Route::get('/customers/', [
        'uses' => 'AdminCustomersController@index',
        'as' => 'admin.customers'
    ]);

    Route::get('/customers/view/{id}', [
        'uses' => 'AdminCustomersController@view',
        'as' => 'admin.customers.view'
    ]);

    Route::get('/customers/edit/{id}', [
        'uses' => 'AdminCustomersController@edit',
        'as' => 'admin.customers.edit'
    ]);

    Route::get('/customers/delete/{id}', [
        'uses' => 'AdminCustomersController@delete',
        'as' => 'admin.customers.delete'
    ]);

    //orders
    Route::get('/orders/', [
        'uses' => 'AdminOrdersController@index',
        'as' => 'admin.orders'
    ]);

    Route::get('/orders/edit/{id}', [
        'uses' => 'AdminOrdersController@edit',
        'as' => 'admin.orders.edit'
    ]);

    Route::get('/orders/view/{id}', [
        'uses' => 'AdminOrdersController@view',
        'as' => 'admin.orders.view'
    ]);

    Route::post('/orders/update/{id}', [
        'uses' => 'AdminOrdersController@update',
        'as' => 'admin.orders.update'
    ]);


    Route::get('/orders/department/{department_id}', [
        'uses' => 'AdminOrdersController@department',
        'as' => 'admin.orders.department'
    ]);

    //Coupon Routes
    Route::get('/coupons/', [
        'uses' => 'AdminCouponsController@index',
        'as' => 'admin.coupons.index'
    ]);

    Route::get('/coupons/create', [
        'uses' => 'AdminCouponsController@create',
        'as' => 'admin.coupons.create'
    ]);

    Route::post('/coupons/store', [
        'uses' => 'AdminCouponsController@store',
        'as' => 'admin.coupons.store'
    ]);

    Route::get('/coupons/edit/{id}', [
        'uses' => 'AdminCouponsController@edit',
        'as' => 'admin.coupons.edit'
    ]);

    Route::post('/coupons/update/{id}', [
        'uses' => 'AdminCouponsController@update',
        'as' => 'admin.coupons.update'
    ]);

    Route::get('/coupons/delete/{id}', [
        'uses' => 'AdminCouponsController@destroy',
        'as' => 'admin.coupons.delete'
    ]);


    //DeliveryRates Routes
    Route::get('/delivery_rates/', [
        'uses' => 'AdminDeliveryController@index',
        'as' => 'admin.delivery_rates.index'
    ]);

    Route::get('/delivery_rates/create', [
        'uses' => 'AdminDeliveryController@create',
        'as' => 'admin.delivery_rates.create'
    ]);

    Route::post('/delivery_rates/store', [
        'uses' => 'AdminDeliveryController@store',
        'as' => 'admin.delivery_rates.store'
    ]);

    Route::get('/delivery_rates/edit/{id}', [
        'uses' => 'AdminDeliveryController@edit',
        'as' => 'admin.delivery_rates.edit'
    ]);

    Route::post('/delivery_rates/update/{id}', [
        'uses' => 'AdminDeliveryController@update',
        'as' => 'admin.delivery_rates.update'
    ]);

    Route::get('/delivery_rates/delete/{id}', [
        'uses' => 'AdminDeliveryController@delete',
        'as' => 'admin.delivery_rates.delete'
    ]);

    //  Shipping Zones
    Route::get( '/shipping-zones',)

    //notification Routes
    Route::get('/notifications/', [
        'uses' => 'AdminNotificationsController@index',
        'as' => 'admin.notifications.index'
    ]);

    Route::get('/notifications/create', [
        'uses' => 'AdminNotificationsController@create',
        'as' => 'admin.notifications.create'
    ]);

    Route::get('/notifications/view/{id}', [
        'uses' => 'AdminNotificationsController@view',
        'as' => 'admin.notifications.view'
    ]);

    Route::get('/notifications/delete/{id}', [
        'uses' => 'AdminNotificationsController@delete',
        'as' => 'admin.notifications.delete'
    ]);

    Route::get('/json-categories', [
        'uses' => 'FetchDynamicController@getCategories',
        'as' => 'admin.json-categories'
    ]);

    Route::get('/json-subcategories', [
        'uses' => 'FetchDynamicController@getSubCategories',
        'as' => 'admin.json-subcategories'
    ]);

    //pages Routes
    Route::get('/pages/', [
        'uses' => 'AdminPagesController@index',
        'as' => 'admin.pages.index'
    ]);

    Route::get('/pages/create', [
        'uses' => 'AdminPagesController@create',
        'as' => 'admin.pages.create'
    ]);

    Route::post('/pages/store', [
        'uses' => 'AdminPagesController@store',
        'as' => 'admin.pages.store'
    ]);

    Route::get('/pages/detail/{id}', [
        'uses' => 'AdminPagesController@detail',
        'as' => 'admin.pages.detail'
    ]);

    Route::get('/pages/edit/{id}', [
        'uses' => 'AdminPagesController@edit',
        'as' => 'admin.pages.edit'
    ]);

    Route::post('/pages/update/{id}', [
        'uses' => 'AdminPagesController@update',
        'as' => 'admin.pages.update'
    ]);

    Route::get('/pages/delete/{id}', [
        'uses' => 'AdminPagesController@delete',
        'as' => 'admin.pages.delete'
    ]);

    Route::post('/pages/destroy/{id}', [
        'uses' => 'AdminPagesController@destroy',
        'as' => 'admin.pages.destroy'
    ]);


    //Articles Routes
    Route::get('/articles/', [
        'uses' => 'AdminArticlesController@index',
        'as' => 'admin.articles.index'
    ]);

    Route::get('/articles/create', [
        'uses' => 'AdminArticlesController@create',
        'as' => 'admin.articles.create'
    ]);

    Route::post('/articles/store', [
        'uses' => 'AdminArticlesController@store',
        'as' => 'admin.articles.store'
    ]);

    Route::get('/articles/edit/{id}', [
        'uses' => 'AdminArticlesController@edit',
        'as' => 'admin.articles.edit'
    ]);

    Route::post('/articles/update/{id}', [
        'uses' => 'AdminArticlesController@update',
        'as' => 'admin.articles.update'
    ]);

    Route::get('/articles/delete/{id}', [
        'uses' => 'AdminArticlesController@delete',
        'as' => 'admin.articles.delete'
    ]);

    Route::post('/articles/destroy/{id}', [
        'uses' => 'AdminArticlesController@destroy',
        'as' => 'admin.articles.destroy'
    ]);
});
