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


Route::get('/', 'MainController@index')->name('index');
Route::get('/product', 'MainController@category')->name('category');


Route::post('/product','MainController@loadDataAjax');

Route::post('/area_select','MainController@area_select')->name('area_select');



Route::get('/search', 'SearchController@search')->name('search');
Route::get('/autocomplete', 'SearchController@autocomplete')->name('autocomplete');


Route::get('/about', 'MainController@about')->name('about');
Route::get('/contact', 'MainController@contact')->name('contact');
Route::get('/Calender', 'MainController@Calender')->name('Calender');
Route::post('/calender1', 'MainController@calender1')->name('calender1');

Route::get('/blog', 'MainController@blog')->name('blog');
Route::get('/Hygiene Day', 'MainController@blog1')->name('blog1');

Route::get('/clear_all_data', 'MainController@clear_all_data')->name('clear_all_data');

Route::get('/product/{slug}', 'MainController@product_single_view')->name('product_single_view');



Route::post('/single_product/view', 'MainController@single_category')->name('single_category');

Route::post('/single_product1/view', 'MainController@single_category1')->name('single_category1');


// cart
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/cart/add', 'CartController@add')->name('cart.store');

Route::get('/load-cart-data','CartController@cartloadbyajax')->name('cartloadbyajax');
Route::get('/load_cart_data_all_data','CartController@load_cart_data_all_data')->name('load_cart_data_all_data');

Route::get('clear-cart','CartController@clearcart')->name('clearcart');
Route::post('update-to-cart','CartController@updatetocart')->name('updatetocart');
Route::post('update-to-cart_side_bar','CartController@updatetocart_side_bar')->name('update-to-cart_side_bar');


Route::delete('delete-from-cart','CartController@deletefromcart')->name('deletefromcart');
Route::delete('delete-from-cart_sidebar','CartController@deletefromcart_sidebar')->name('deletefromcart_sidebar');

Route::post('/cart/add/single_product', 'CartController@add_single')->name('single_product_cart.store');
Route::post('/cart/add/quantity_increase_dcrease_last', 'CartController@quantity_increase_dcrease_last')->name('quantity_increase_dcrease_last');
Route::post('/cart/add/quantity_increase_dcrease', 'CartController@quantity_increase_dcrease')->name('quantity_increase_dcrease');




Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');
Route::post('/cart/clear', 'CartController@clear')->name('cart.clear');


Route::get('/customer/dashoard/login', 'CustomerLoginController@customer_login')->name('customer_dashoard.login');
Route::get('/customer/dashoard/register', 'CustomerLoginController@customer_register')->name('customer_dashoard.register');


Route::get('/customer_login', 'CustomerLoginController@customer_login_header')->name('customer_dashoard_header.login');
Route::get('/customer_register', 'CustomerLoginController@customer_register_header')->name('customer_dashoard_header.register');
Route::get('/period_information', 'CustomerLoginController@period_information')->name('period_information');

Route::post('/period_information_update_input', 'PeriodInfoController@period_information_update_input')->name('period_information_update_input');
Route::post('/period_information_update_input_list', 'PeriodInfoController@period_information_update_input_list')->name('period_information_update_input_list');
Route::post('/period_information_update_prediction', 'PeriodInfoController@period_information_update_prediction')->name('period_information_update_prediction');
Route::post('/period_information_update_prediction_list', 'PeriodInfoController@period_information_update_prediction_list')->name('period_information_update_prediction_list');



Route::post('/customer_data_store', 'CustomerLoginController@customer_data_store')->name('customer_data_store');
Route::post('/customer_login_check', 'CustomerLoginController@customer_login_check')->name('customer_login_check');
Route::post('/customer_information_edit', 'CustomerLoginController@customer_information_edit')->name('customer_information_edit');


Route::get('/shipping', 'ShippingController@shippinindex')->name('shipping.index');
Route::post('/shipping/add', 'ShippingController@add')->name('shipping.store');


Route::get('/customer_addresss', 'CustomerLoginController@customer_addresss')->name('customer_addresss');
Route::post('/customer_addresss_edit', 'CustomerLoginController@customer_addresss_edit')->name('customer_addresss_edit');


Route::get('/customer_history', 'CustomerLoginController@customer_history')->name('customer_history');
//Route::post('/customer_addresss_edit', 'CustomerLoginController@customer_addresss_edit')->name('customer_addresss_edit');


//cupon  check route

Route::post('/cupon_check', 'MainController@cupon_check')->name('cupon_check');
Route::get('/shipping_name', 'ShippingController@shipping_name')->name('shipping_name');

Route::post('/filter_view', 'MainController@filter_view')->name('filter_view');
Route::post('/filter_view_brand', 'MainController@filter_view_brand')->name('filter_view_brand');
Route::post('/filter_view1', 'MainController@filter_view1')->name('filter_view1');


Route::match(['get', 'post'],'/products-filter', 'MainController@filter');


Route::match(['get', 'post'],'/brand_wise_product_filter/{id}', 'MainController@brand_wise_product_filter');



Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin'], function () {

   //dasboard route
Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
     //Route::resource('roles',RolesController::class);


//category


     Route::get('parent_category','Admin\CategoryController@index')->name('admin.category');
     Route::get('/parent_category/add','Admin\CategoryController@create')->name('admin.category.create');
     Route::post('/parent_category/store/all','Admin\CategoryController@store')->name('admin.category.store');
     Route::post('/parent_category/destroy/{id}','Admin\CategoryController@destroy')->name('admin.category.destroy');
     Route::get('/parent_category/edit/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
     Route::get('/parent_category/view/{id}','Admin\CategoryController@view')->name('admin.category.view');
     Route::post('/parent_category/update/','Admin\CategoryController@update')->name('admin.category.update');


     //parent_description


     Route::get('parent_description','Admin\ParentDescriptionController@index')->name('admin.parent_description');
     Route::get('/parent_description/add','Admin\ParentDescriptionController@create')->name('admin.parent_description.create');
     Route::post('/parent_description/store/all','Admin\ParentDescriptionController@store')->name('admin.parent_description.store');
     Route::post('/parent_description/destroy/{id}','Admin\ParentDescriptionController@destroy')->name('admin.parent_description.destroy');
     Route::get('/parent_description/edit/{id}','Admin\ParentDescriptionController@edit')->name('admin.parent_description.edit');
     Route::get('/parent_description/view/{id}','Admin\ParentDescriptionController@view')->name('admin.parent_description.view');
     Route::post('/parent_description/update/','Admin\ParentDescriptionController@update')->name('admin.parent_description.update');



     //child description
     Route::get('child_description','Admin\ChildDescriptionController@index')->name('admin.child_description');
     Route::get('/child_description/add','Admin\ChildDescriptionController@create')->name('admin.child_description.create');
     Route::post('/child_description/store/all','Admin\ChildDescriptionController@store')->name('admin.child_description.store');
     Route::post('/child_description/destroy/{id}','Admin\ChildDescriptionController@destroy')->name('admin.child_description.destroy');
     Route::get('/child_description/edit/{id}','Admin\ChildDescriptionController@edit')->name('admin.child_description.edit');
     Route::get('/child_description/view/{id}','Admin\ChildDescriptionController@view')->name('admin.child_description.view');
     Route::post('/child_description/update/','Admin\ChildDescriptionController@update')->name('admin.child_description.update');


     //volume
     Route::get('volume','Admin\VolumeController@index')->name('admin.volume');
     Route::get('/volume/add','Admin\VolumeController@create')->name('admin.volume.create');
     Route::post('/volume/store/all','Admin\VolumeController@store')->name('admin.volume.store');
     Route::post('/volume/destroy/{id}','Admin\VolumeController@destroy')->name('admin.volume.destroy');
     Route::get('/volume/edit/{id}','Admin\VolumeController@edit')->name('admin.volume.edit');
     Route::get('/volume/view/{id}','Admin\VolumeController@view')->name('admin.volume.view');
     Route::post('/volume/update/','Admin\VolumeController@update')->name('admin.volume.update');




     //Shipping
     Route::get('shipping','Admin\ShipingController@index')->name('admin.shipping');
     Route::get('/shipping/add','Admin\ShipingController@create')->name('admin.shipping.create');
     Route::post('/shipping/store/all','Admin\ShipingController@store')->name('admin.shipping.store');
     Route::post('/shipping/destroy/{id}','Admin\ShipingController@destroy')->name('admin.shipping.destroy');
     Route::get('/shipping/edit/{id}','Admin\ShipingController@edit')->name('admin.shipping.edit');
     Route::get('/shipping/view/{id}','Admin\ShipingController@view')->name('admin.shipping.view');
     Route::post('/shipping/update/','Admin\ShipingController@update')->name('admin.shipping.update');


     //Shipping_charge
     Route::get('shipping_charge','Admin\ShipChargeController@index')->name('admin.shipping_charge');
     Route::get('/shipping_charge/add','Admin\ShipChargeController@create')->name('admin.shipping_charge.create');
     Route::post('/shipping_charge/store/all','Admin\ShipChargeController@store')->name('admin.shipping_charge.store');
     Route::post('/shipping_charge/destroy/{id}','Admin\ShipChargeController@destroy')->name('admin.shipping_charge.destroy');
     Route::get('/shipping_charge/edit/{id}','Admin\ShipChargeController@edit')->name('admin.shipping_charge.edit');
     Route::get('/shipping_charge/view/{id}','Admin\ShipChargeController@view')->name('admin.shipping_charge.view');
     Route::post('/shipping_charge/update/','Admin\ShipChargeController@update')->name('admin.shipping_charge.update');



     //reward
     Route::get('reward','Admin\RewardController@index')->name('admin.reward');
     Route::get('/reward/add','Admin\RewardController@create')->name('admin.reward.create');
     Route::post('/reward/store/all','Admin\RewardController@store')->name('admin.reward.store');
     Route::post('/reward/destroy/{id}','Admin\RewardController@destroy')->name('admin.reward.destroy');
     Route::get('/reward/edit/{id}','Admin\RewardController@edit')->name('admin.reward.edit');
     Route::get('/reward/view/{id}','Admin\RewardController@view')->name('admin.reward.view');
     Route::post('/reward/update/','Admin\RewardController@update')->name('admin.reward.update');


     //supplier
     Route::get('supplier','Admin\SupplierController@index')->name('admin.supplier');
     Route::get('/supplier/add','Admin\SupplierController@create')->name('admin.supplier.create');
     Route::post('/supplier/store/all','Admin\SupplierController@store')->name('admin.supplier.store');
     Route::post('/supplier/destroy/{id}','Admin\SupplierController@destroy')->name('admin.supplier.destroy');
     Route::get('/supplier/edit/{id}','Admin\SupplierController@edit')->name('admin.supplier.edit');
     Route::get('/supplier/view/{id}','Admin\SupplierController@view')->name('admin.supplier.view');
     Route::post('/supplier/update/','Admin\SupplierController@update')->name('admin.supplier.update');



     Route::post('/child_description/select_new','Admin\ChildDescriptionController@select_people')->name('admin.select_people');
     Route::post('/sucategory/select_new','Admin\ProductController@select_people')->name('admin.select_subcat');
     Route::post('/sucategory_des/select_new','Admin\ProductController@select_people_des')->name('admin.select_subcat_des');

     //sub_category


     Route::get('child_category','Admin\SubcategoryController@index')->name('admin.subcategory');
     Route::get('/child_category/add','Admin\SubcategoryController@create')->name('admin.subcategory.create');
     Route::post('/child_category/store/all','Admin\SubcategoryController@store')->name('admin.subcategory.store');
     Route::post('/child_category/destroy/{id}','Admin\SubcategoryController@destroy')->name('admin.subcategory.destroy');
     Route::get('/child_category/edit/{id}','Admin\SubcategoryController@edit')->name('admin.subcategory.edit');
     Route::get('/child_category/view/{id}','Admin\SubcategoryController@view')->name('admin.subcategory.view');
     Route::post('/child_category/update/','Admin\SubcategoryController@update')->name('admin.subcategory.update');


     Route::get('brand','Admin\BrandController@index')->name('admin.brand');
     Route::get('/brand/add','Admin\BrandController@create')->name('admin.brand.create');
     Route::post('/brand/store/all','Admin\BrandController@store')->name('admin.brand.store');
     Route::post('/brand/destroy/{id}','Admin\BrandController@destroy')->name('admin.brand.destroy');
     Route::get('/brand/edit/{id}','Admin\BrandController@edit')->name('admin.brand.edit');
     Route::get('/brand/view/{id}','Admin\BrandController@view')->name('admin.brand.view');
     Route::post('/brand/update/','Admin\BrandController@update')->name('admin.brand.update');



      //product


     Route::get('product','Admin\ProductController@index')->name('admin.product');
     Route::get('/product/add','Admin\ProductController@create')->name('admin.product.create');
     Route::post('/product/store/all','Admin\ProductController@store')->name('admin.product.store');
     Route::post('/product/destroy/{id}','Admin\ProductController@destroy')->name('admin.product.destroy');
     Route::get('/product/edit/{id}','Admin\ProductController@edit')->name('admin.product.edit');
     Route::get('/product/view/{id}','Admin\ProductController@view')->name('admin.product.view');
     Route::post('/product/update/','Admin\ProductController@update')->name('admin.product.update');

     Route::post('image-view','Admin\ProductController@store1');


       Route::post('/productdes/edit/','Admin\ProductController@update1')->name('admin.product.productEdit');

       Route::post('/productdes_image/edit/','Admin\ProductController@update1image')->name('admin.product.productEditimage');

Route::post('/productdes_image/add/','Admin\ProductController@addimage')->name('admin.product.productAddimage');

        Route::post('productdes_update/','Admin\ProductController@update12')->name('admin.product.productUpdate');

Route::post('productimg_update/','Admin\ProductController@updateimg')->name('admin.product.productUpdateimg');


Route::post('productimg_add/','Admin\ProductController@addimg')->name('admin.product.productaddimg');

Route::post('/product_img_delete/{id}','Admin\ProductController@product_img_delete')->name('admin.product.product_img_delete');



        // Route::get('order','Admin\OrderController@index')->name('admin.order');
        // Route::get('/new/order','Admin\OrderController@neworder')->name('admin.new_order');
        // Route::get('/order/detail/{id}','Admin\OrderController@detail')->name('admin.order.detail');
        // Route::post('/order/store','Admin\OrderController@store')->name('admin.order.store');
        // Route::post('/order/destroy/{id}','Admin\OrderController@destroy')->name('admin.order.destroy');
        // Route::get('/order/print/{id}','Admin\OrderController@print')->name('admin.order.print');
        // Route::post('/order/update/','Admin\OrderController@update')->name('admin.order.update');

      //stock


     Route::get('stock','Admin\'StockController@index')->name('admin.stock');
     Route::get('/stock/add','Admin\'StockController@create')->name('admin.stock.create');
     Route::post('/stock/store/all','Admin\'StockController@store')->name('admin.stock.store');
     Route::post('/stock/destroy/{id}','Admin\'StockController@destroy')->name('admin.stock.destroy');
     Route::get('/stock/edit/{id}','Admin\'StockController@edit')->name('admin.stock.edit');
     Route::get('/stock/view/{id}','Admin\'StockController@view')->name('admin.stock.view');
     Route::post('/stock/update/','Admin\'StockController@update')->name('admin.stock.update');


      //stock


     Route::get('offer','Admin\'OfferController@index')->name('admin.offer');
     Route::get('/offer/add','Admin\'OfferController@create')->name('admin.offer.create');
     Route::post('/offer/store/all','Admin\'OfferController@store')->name('admin.offer.store');
     Route::post('/offer/destroy/{id}','Admin\'OfferController@destroy')->name('admin.offer.destroy');
     Route::get('/offer/edit/{id}','Admin\'OfferController@edit')->name('admin.offer.edit');
     Route::get('/offer/view/{id}','Admin\'OfferController@view')->name('admin.offer.view');
     Route::post('/offer/update/','Admin\'OfferController@update')->name('admin.offer.update');


     //merchant


     Route::get('merchant','Admin\'MerchantController@index')->name('admin.merchant');
     Route::get('/merchant/add','Admin\'MerchantController@create')->name('admin.merchant.create');
     Route::post('/merchant/store/all','Admin\'MerchantController@store')->name('admin.merchant.store');
     Route::post('/merchant/destroy/{id}','Admin\'MerchantController@destroy')->name('admin.merchant.destroy');
     Route::get('/merchant/edit/{id}','Admin\'MerchantController@edit')->name('admin.merchant.edit');
     Route::get('/merchant/view/{id}','Admin\'MerchantController@view')->name('admin.merchant.view');
     Route::post('/merchant/update/','Admin\'MerchantController@update')->name('admin.merchant.update');



     //customer


     Route::get('customer','Admin\'CustomerController@index')->name('admin.customer');
     Route::get('/customer/add','Admin\'CustomerController@create')->name('admin.customer.create');
     Route::post('/customer/store/all','Admin\'CustomerController@store')->name('admin.customer.store');
     Route::post('/customer/destroy/{id}','Admin\'CustomerController@destroy')->name('admin.customer.destroy');
     Route::get('/customer/edit/{id}','Admin\'CustomerController@edit')->name('admin.customer.edit');
     Route::get('/customer/view/{id}','Admin\'CustomerController@view')->name('admin.customer.view');
     Route::post('/customer/update/','Admin\'CustomerController@update')->name('admin.customer.update');



     //order


     Route::get('all_order','Admin\OrderController@all_order')->name('admin.all_order');
     Route::get('processing_order','Admin\OrderController@processing_order')->name('admin.processing_order');
     Route::get('received_order','Admin\OrderController@received_order')->name('admin.received_order');


     Route::post('all_order/status_update','Admin\OrderController@all_order_status_update')->name('admin.all_order_status_update');
     Route::post('all_order/status_update/store','Admin\OrderController@all_order_status_update_store')->name('admin.all_order_status_update_store');


     Route::get('/order/add','Admin\'OrderController@create')->name('admin.order.create');
     Route::post('/order/store/all','Admin\OrderController@store')->name('admin.order.store');
     Route::post('/order/destroy/{id}','Admin\OrderController@destroy')->name('admin.order.destroy');
     Route::get('/order/edit/{id}','Admin\OrderController@edit')->name('admin.order.edit');
     Route::get('/order/view/{id}','Admin\OrderController@view')->name('admin.order.view');
     Route::get('/process_order/view/{id}','Admin\OrderController@process_view')->name('admin.process_order.view');
     Route::get('/receive_order/view/{id}','Admin\OrderController@receive_view')->name('admin.receive_order.view');
     Route::post('/order/update/','Admin\OrderController@update')->name('admin.order.update');




      //address


     Route::get('address','Admin\'AddressController@index')->name('admin.address');
     Route::get('/address/add','Admin\'AddressController@create')->name('admin.address.create');
     Route::post('/address/store/all','Admin\'AddressController@store')->name('admin.address.store');
     Route::post('/address/destroy/{id}','Admin\'AddressController@destroy')->name('admin.address.destroy');
     Route::get('/address/edit/{id}','Admin\'AddressController@edit')->name('admin.address.edit');
     Route::get('/address/view/{id}','Admin\'AddressController@view')->name('admin.address.view');
     Route::post('/address/update/','Admin\'AddressController@update')->name('admin.address.update');



     //cupon


     Route::get('cupon','Admin\CuponController@index')->name('admin.cupon');
     Route::get('/cupon/add','Admin\CuponController@create')->name('admin.cupon.create');
     Route::post('/cupon/store/all','Admin\CuponController@store')->name('admin.cupon.store');
     Route::post('/cupon/destroy/{id}','Admin\CuponController@destroy')->name('admin.cupon.destroy');
     Route::get('/cupon/edit/{id}','Admin\CuponController@edit')->name('admin.cupon.edit');
     Route::get('/cupon/view/{id}','Admin\CuponController@view')->name('admin.cupon.view');
     Route::post('/cupon/update/','Admin\CuponController@update')->name('admin.cupon.update');


   //contact


     Route::get('contact','Admin\'ContactController@index')->name('admin.contact');
     Route::get('/contact/add','Admin\'ContactController@create')->name('admin.contact.create');
     Route::post('/contact/store/all','Admin\'ContactController@store')->name('admin.contact.store');
     Route::post('/contact/destroy/{id}','Admin\'ContactController@destroy')->name('admin.contact.destroy');
     Route::get('/contact/edit/{id}','Admin\'ContactController@edit')->name('admin.contact.edit');
     Route::get('/contact/view/{id}','Admin\'ContactController@view')->name('admin.contact.view');
     Route::post('/contact/update/','Admin\'ContactController@update')->name('admin.contact.update');


	//roles create route

  Route::get('roles', 'Admin\RolesController@index')->name('admin.roles');
    Route::get('roles/create','Admin\RolesController@create')->name('admin.roles.create');
    Route::post('roles/store', 'Admin\RolesController@store')->name('admin.roles.store');
    Route::get('roles/edit/{id}','Admin\RolesController@edit')->name('admin.roles.edit');
    Route::post('roles/update/','Admin\RolesController@update')->name('admin.roles.update');

    Route::delete('roles/delete/{id}','Admin\RolesController@destroy')->name('admin.roles.delete');



    //users create route

  Route::get('users', 'Admin\UsersController@index')->name('admin.users');
    Route::get('users/create','Admin\UsersController@create')->name('admin.users.create');
    Route::post('users/store', 'Admin\UsersController@store')->name('admin.users.store');
    Route::get('users/edit/{id}','Admin\UsersController@edit')->name('admin.users.edit');
    Route::post('users/update/','Admin\UsersController@update')->name('admin.users.update');

    Route::delete('users/delete/{id}','Admin\UsersController@destroy')->name('admin.users.delete');





     //permission create route

    Route::get('permission', 'Admin\PermissionController@index')->name('admin.permission');
    Route::get('permission/create','Admin\PermissionController@create')->name('admin.permission.create');
    Route::post('permission/store', 'Admin\PermissionController@store')->name('admin.permission.store');
    Route::get('permission/edit/{id}','Admin\PermissionController@edit')->name('admin.permission.edit');
    Route::get('permission/view/{id}','Admin\PermissionController@view')->name('admin.permission.view');
    Route::post('permission/update/','Admin\PermissionController@update')->name('admin.permission.update');

    Route::delete('permission/delete/{id}','Admin\PermissionController@destroy')->name('admin.permission.delete');


    //profile route


    Route::get('profile', 'Admin\ProfileController@index')->name('admin.profile');
    Route::get('profile/edit/{id}', 'Admin\ProfileController@edit')->name('admin.profile.edit');
    Route::put('profile/update/{id}', 'Admin\ProfileController@update')->name('admin.profile.update');

    Route::post('password/update','Admin\ProfileController@updatePassword')->name('admin.password.update');



    // Login Routes
    // Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Admin\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Admin\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Admin\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Admin\Auth\ForgetPasswordController@reset')->name('admin.password.update12');

});
