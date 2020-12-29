<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');

Route::group(['prefix' => 'admin-auth'], function () {
    Route::get('/login','AdminLoginController@login');
    Route::post('/login',[
        'as' =>'admin.login',
        'uses' =>'AdminLoginController@postLogin'
    ]);
    Route::get('/logout',[
        'as' =>'admin.logoutAdmin',
        'uses' =>'AdminLoginController@logoutAdmin'
    ]);
});
Route::get('/admin-api','AdminController@index')->middleware('admin');
// Backend Admin
Route::group(['prefix' => 'admin-api','middleware' => 'admin'], function () {

    //Danh mục
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' =>'categories.index',
            'uses' =>'CategoryController@index',
            'middleware' => 'can:list_category'
        ]);
        Route::get('/create',[
            'as' =>'categories.create',
            'uses' =>'CategoryController@create',
            'middleware' => 'can:add_category'
        ]);
        Route::post('/add',[
            'as' =>'categories.add',
            'uses' =>'CategoryController@add'
        ]);
        Route::get('/edit/{id}',[
            'as' =>'categories.edit',
            'uses' =>'CategoryController@edit',
            'middleware' => 'can:edit_category'
        ]);
        Route::post('/update/{id}',[
            'as' =>'categories.update',
            'uses' =>'CategoryController@update'
        ]);
        Route::get('/active/{id}',[
            'as' =>'categories.active',
            'uses' =>'CategoryController@active'
        ]);
        Route::get('/delete/{id}',[
            'as' =>'categories.delete',
            'uses' =>'CategoryController@delete',
            'middleware' => 'can:delete_category'
        ]);
    });

    //Product
    Route::prefix('product')->group(function () {
        Route::get('/',[
            'as' =>'product.index',
            'uses' =>'AdminProductController@index',
            'middleware' => 'can:list_product'
        ]);
        Route::get('/create',[
            'as' =>'product.create',
            'uses' =>'AdminProductController@create',
            'middleware' => 'can:add_product'
        ]);
        Route::post('/add',[
            'as' =>'product.add',
            'uses' =>'AdminProductController@add'
        ]);
        Route::get('/edit/{id}',[
            'as' =>'product.edit',
            'uses' =>'AdminProductController@edit',
            'middleware' => 'can:edit_product'
        ]);
        Route::post('/update/{id}',[
            'as' =>'product.update',
            'uses' =>'AdminProductController@update'
        ]);
        Route::get('/active/{id}',[
            'as' =>'product.active',
            'uses' =>'AdminProductController@active'
        ]);
        Route::get('/product-detail/{id}',[
            'as' =>'product.prodetail',
            'uses' =>'AdminProductController@productDetail',
            'middleware' => 'can:delete_product'
        ]);
    });

    // Slider

    Route::prefix('slider')->group(function () {
        Route::get('/',[
            'as' =>'slider.index',
            'uses' =>'AdminSliderController@index',
            'middleware' => 'can:list_slider'
        ]);
        Route::get('/create',[
            'as' =>'slider.create',
            'uses' =>'AdminSliderController@create',
            'middleware' => 'can:add_slider'
        ]);
        Route::post('/add',[
            'as' =>'slider.add',
            'uses' =>'AdminSliderController@add'
        ]);
        Route::get('/edit/{id}',[
            'as' =>'slider.edit',
            'uses' =>'AdminSliderController@edit',
            'middleware' => 'can:edit_slider'
        ]);
        Route::post('/update/{id}',[
            'as' =>'slider.update',
            'uses' =>'AdminSliderController@update'
        ]);
        Route::get('/active/{id}',[
            'as' =>'slider.active',
            'uses' =>'AdminSliderController@active'
        ]);
        Route::get('/delete/{id}',[
            'as' =>'slider.delete',
            'uses' =>'AdminSliderController@delete',
            'middleware' => 'can:delete_slider'
        ]);
    });

    //Settings
    Route::prefix('settings')->group(function () {
        Route::get('/',[
            'as' =>'settings.index',
            'uses' =>'AdminSettingsController@index',
            'middleware' => 'can:list_settings'
        ]);
        Route::get('/create',[
            'as' =>'settings.create',
            'uses' =>'AdminSettingsController@create',
            'middleware' => 'can:add_settings'
        ]);
        Route::post('/add',[
            'as' =>'settings.add',
            'uses' =>'AdminSettingsController@add'
        ]);
        Route::get('/edit/{id}',[
            'as' =>'settings.edit',
            'uses' =>'AdminSettingsController@edit',
            'middleware' => 'can:edit_settings'
        ]);
        Route::post('/update/{id}',[
            'as' =>'settings.update',
            'uses' =>'AdminSettingsController@update'
        ]);
    });

    // User

    Route::prefix('users')->group(function () {
        Route::get('/',[
            'as' =>'users.index',
            'uses' =>'AdminUserController@index',
            'middleware' => 'can:list_user'
        ]);
        Route::get('/create',[
            'as' =>'users.create',
            'uses' =>'AdminUserController@create',
            'middleware' => 'can:add_user'
        ]);
        Route::post('/store',[
            'as' =>'users.store',
            'uses' =>'AdminUserController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' =>'users.edit',
            'uses' =>'AdminUserController@edit',
            'middleware' => 'can:edit_user'
        ]);
        Route::post('/update/{id}',[
            'as' =>'users.update',
            'uses' =>'AdminUserController@update'
        ]);
    });
    //Rle
    Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as' =>'roles.index',
            'uses' =>'AdminRoleController@index'
        ]);
        Route::get('/create',[
            'as' =>'roles.create',
            'uses' =>'AdminRoleController@create'
        ]);
        Route::post('/store',[
            'as' =>'roles.store',
            'uses' =>'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' =>'roles.edit',
            'uses' =>'AdminRoleController@edit'
        ]);
        Route::post('/update/{id}',[
            'as' =>'roles.update',
            'uses' =>'AdminRoleController@update'
        ]);
    });
    //Permission
    Route::prefix('permissions')->group(function () {
        Route::get('/create',[
            'as' =>'permissions.create',
            'uses' =>'AdminPermissionController@create'
        ]);
        Route::post('/store',[
            'as' =>'permissions.store',
            'uses' =>'AdminPermissionController@store'
        ]);
    });
    //Đơn hàng
    Route::prefix('transaction')->group(function () {
        Route::get('/',[
            'as' =>'transaction.index',
            'uses' =>'AdminTransactionController@index',
            'middleware' => 'can:list_transaction'
        ]);
        Route::get('/delete/{id}',[
            'as' =>'transaction.delete',
            'uses' =>'AdminTransactionController@delete',
            'middleware' => 'can:delete_transaction'
        ]);
        Route::get('/view-transaction/{id}',[
            'as' =>'transaction.detail',
            'uses' =>'AdminTransactionController@TransactionDetail',
            'middleware' => 'can:list_transaction'
        ]);
        Route::get('/order-delete/{id}',[
            'as' =>'transaction.orderdelete',
            'uses' =>'AdminTransactionController@deleteOrder',
            'middleware' => 'can:delete_transaction'
        ]);
        Route::get('/action/{action}/{id}',[
            'as' =>'transaction.action',
            'uses' =>'AdminTransactionController@getAction'
        ]);
    });

    //Chi tiết sp laptop
    Route::prefix('lap-attribute')->group(function () {
        Route::get('/add-attribute/{id}',[
            'as' =>'attr.add',
            'uses' =>'AttributeController@getAddAttribute'
        ]);
        Route::post('/add-attribute/{id}',[
            'as' =>'attr.postAdd',
            'uses' =>'AttributeController@postAddAttribute'
        ]);
        Route::get('/edit-attribute/{id}',[
            'as' =>'attr.editAttr',
            'uses' =>'AttributeController@editAttribute'
        ]);
    });

    //comment
    Route::prefix('comments')->group(function () {
        Route::get('/',[
            'as' =>'comments.index',
            'uses' =>'AdminCommentController@index'
        ]);
        Route::get('/active-comment/{id}',[
            'as' =>'comments.active',
            'uses' =>'AdminCommentController@active'
        ]);
        Route::post('/replay-comment/{id}',[
            'as' =>'comments.replay',
            'uses' =>'AdminCommentController@replay'
        ]);
        Route::get('/delete-comment/{id}',[
            'as' =>'comments.delete',
            'uses' =>'AdminCommentController@delete'
        ]);
    });

    //admin blog
    Route::prefix('blogs')->group(function () {
        Route::get('/',[
            'as' =>'Adminblogs.index',
            'uses' =>'AdminBlogController@index'
        ]);
        Route::get('/create',[
            'as' =>'Adminblogs.create',
            'uses' =>'AdminBlogController@create'
        ]);
        Route::post('/add',[
            'as' =>'Adminblogs.add',
            'uses' =>'AdminBlogController@add'
        ]);
        Route::get('/edit-blog/{id}',[
            'as' =>'Adminblogs.getedit',
            'uses' =>'AdminBlogController@getEdit'
        ]);
        Route::post('/edit-blog/{id}',[
            'as' =>'Adminblogs.postEdit',
            'uses' =>'AdminBlogController@postEdit'
        ]);
        Route::get('/active/{id}',[
            'as' =>'Adminblogs.active',
            'uses' =>'AdminBlogController@active'
        ]);
    });
});

// Frontend 

Route::get('/category/{slug}/{id}',[
    'as' =>'product.category',
    'uses' =>'ProductsController@index'
]);
Route::get('/san-pham/{slug}/{id}',[
    'as' =>'product.detail',
    'uses' =>'ProductsController@detail'
]);
Route::get('/tat-ca-san-pham',[
    'as' =>'product.allproduct',
    'uses' =>'ProductsController@allproduct'
]);
//search
Route::post('/search',[
    'as' =>'product.search',
    'uses' =>'ProductsController@getSearch'
]);
Route::post('/autocomplete-search',[
    'as' =>'product.searchajax',
    'uses' =>'ProductsController@getSearchAjax'
]);
Route::post('/comments/{id}',[
    'as' =>'product.comment',
    'uses' =>'ProductsController@postComment'
]);
//Cart
Route::get('/add-to-cart/{id}',[
    'as' =>'addToCart',
    'uses' =>'CartController@addToCart'
]);
Route::get('/gio-hang',[
    'as' =>'cart.index',
    'uses' =>'CartController@index'
]);
Route::get('/products/update-cart',[
    'as' =>'cart.update',
    'uses' =>'CartController@updateCart'
]);
Route::get('/delete-cart/{id}',[
    'as' =>'cart.delete',
    'uses' =>'CartController@deleteCart'
]);

// Login
Route::prefix('account')->group(function () {
    Route::get('/login',[
        'as' =>'account.login',
        'uses' =>'LoginController@getFormLogin'
    ]);
    Route::post('/login',[
        'as' =>'account.postlogin',
        'uses' =>'LoginController@postFormLogin'
    ]);
    Route::post('/register',[
        'as' =>'account.postRegister',
        'uses' =>'LoginController@postFormRegister'
    ]);
    Route::get('/logout',[
        'as' =>'account.logout',
        'uses' =>'LoginController@getLogout'
    ]);
    Route::get('/checkout',[
        'as' =>'account.checkout',
        'uses' =>'LoginController@checkout'
    ]);
    Route::post('/checkout',[
        'as' =>'account.postPay',
        'uses' =>'LoginController@postPay'
    ]);
    Route::get('/',[
        'as' =>'account.index',
        'uses' =>'LoginController@index'
    ]);
    Route::get('/don-hang',[
        'as' =>'account.traninfo',
        'uses' =>'LoginController@infoTransaction'
    ]);
    Route::get('/don-hang/{id}',[
        'as' =>'account.trandetail',
        'uses' =>'LoginController@DetailTransaction'
    ]);
    Route::get('/don-hang/cancel/{id}',[
        'as' =>'account.cancel',
        'uses' =>'LoginController@cancelTransaction'
    ]);
});

//blog
Route::prefix('blogs')->group(function () {
    Route::get('/',[
        'as' =>'blogs.index',
        'uses' =>'BlogController@index'
    ]);
    Route::get('/{slug}/{id}',[
        'as' =>'blogs.detail',
        'uses' =>'BlogController@detail'
    ]);
});



