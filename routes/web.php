<?php

use Illuminate\Support\Facades\Route;

// login and logout routes (with session)
Route::get('/', 'User\UserController@loginForm');
Route::post('/post_login', 'User\UserController@loginPost');
Route::get('/logout', 'User\UserController@logout');

// superadmin
// user routes
Route::get('/superadmin/dashboard', 'SuperAdmin\SuperAdminController@dashboard');
Route::get('/userlist', 'User\UserController@userList');
Route::get('/adduser', 'User\UserController@createUser');
Route::post('/post_user', 'User\UserController@postUser');
Route::get('/edituser/{id}', 'User\UserController@editUser');
Route::post('/edituserpost', 'User\UserController@editUserPost');


// Super Admin profile
Route::get('superadmin/profile', 'User\UserController@superAdminProfile');
Route::post('superadmin/save_profile', 'User\UserController@saveSuperAdminProfile');

// profile
Route::get('/kitchener/profile', 'User\UserController@kitchenerprofile');
Route::post('/kitchhener/save_profile', 'User\UserController@savekitchenerProfile');


// kitchen staff
Route::get('/kitchener/dashboard', 'Kitchener\KitchenerController@dashboard');
Route::get('/place_order', 'Kitchener\KitchenerController@placeOrder');
Route::post('/post_order', 'Kitchener\KitchenerController@postPlaceOrder');
Route::get('/kitchener/order_history', 'Kitchener\KitchenerController@OrderHistory');


//super admin order
Route::get('/superadmin/neworders', 'SuperAdmin\SuperAdminController@neworders');
Route::get('/superadmin/order_history', 'SuperAdmin\SuperAdminController@OrderHistory');

// super admin waste
Route::get('/superadminwastes', 'SuperAdmin\SuperAdminController@wastes');

// admin
Route::get('/admin/dashboard', 'Admin\AdminController@dashboard');

// Admin new order
Route::get('/admin/neworders', 'Admin\AdminController@neworders');
Route::get('/admin/order_history', 'Admin\AdminController@OrderHistory');



// accept and reject order
Route::post('/accept_order/{id}', 'Admin\AdminController@acceptOrder');
Route::get('/reject/{id}', 'Admin\AdminController@RejectOrder');

// ingredient category
Route::get('/add_ingredient_category', 'Ingredient\IngredientController@addIngredientCategory');
Route::post('/post_ingredient_category', 'Ingredient\IngredientController@postIngredientCategory');
Route::get('/delete_ingredient_category/{id}', 'Ingredient\IngredientController@deleteIngredientCategory');
Route::get('/edit_ingredient_category/{id}', 'Ingredient\IngredientController@editIngredientCategory');
Route::post('/edit_ingredient_category_post', 'Ingredient\IngredientController@editIngredientCategoryPost');

// ingredient sub category 
Route::get('/add_ingredient_subcategory', 'Ingredient\IngredientController@addIngredientSubCategory');
Route::post('/post_ingredient_subcategory', 'Ingredient\IngredientController@postIngredientSubCategory');
Route::get('/delete_ingredient_subcategory/{id}', 'Ingredient\IngredientController@deleteIngredientSubCategory');
Route::get('/edit_ingredient_subcategory/{id}', 'Ingredient\IngredientController@editIngredientSubCategory');
Route::post('/edit_ingredient_subcategory_post', 'Ingredient\IngredientController@editIngredientSubCategoryPost');

// ingredient
Route::get('/ingredients', 'Ingredient\IngredientController@ingredients');
Route::post('/post_ingredient', 'Ingredient\IngredientController@postIngredient');
Route::get('/delete_ingredient/{id}', 'Ingredient\IngredientController@deleteIngredient');
Route::get('/edit_ingredient/{id}', 'Ingredient\IngredientController@editIngredient');
Route::post('/edit_ingredient_post', 'Ingredient\IngredientController@editIngredientPost');
// stocks
Route::get('/stock_entry/{id}', 'Ingredient\IngredientController@stock');
// Route::get('/submit_stock/{id}', 'Ingredient\IngredientController@saveStock');
Route::post('/submit_stock/{ingredient_id}', 'Ingredient\IngredientController@StockPost');


// unit
// create ingredient_unit
Route::get('/units', 'Ingredient\IngredientController@createIngredientUnitForm');
Route::post('/create_ingredient_unit', 'Ingredient\IngredientController@createIngredientUnit');

Route::get('/editunit/{id}', 'Ingredient\IngredientController@editunit');
Route::post('/punit/{id}', 'Ingredient\IngredientController@punit');
Route::get('/deleteunit/{id}', 'Ingredient\IngredientController@deleteunit');


// profile
Route::get('admin/profile', 'User\UserController@adminProfile');
Route::post('admin/save_profile', 'User\UserController@saveAdminProfile');

// profile
Route::get('kitchener/profile', 'User\UserController@kitchenerProfile');
Route::post('kitchener/save_profile', 'User\UserController@saveKitchenerProfile');

// check if the order should be accepted or rejected by checking the stock amount and the request amoount
Route::get('/admin/check/{id}', 'Admin\AdminController@checkStock');
// purchase order placement
Route::get('/admin/place_purchase', 'Admin\AdminController@placePurchase');
Route::post('/submit_purchase_request', 'Admin\AdminController@placePurchasePost');
Route::get('admin/place_purchase_request/{id}', 'Admin\AdminController@placePurchaseIngredient');
// waste
Route::get('/wastes', 'Waste\WasteController@wastes');
Route::get('/waste_blade', 'Waste\WasteController@wasteblade');

// super Admin Report
Route::get('/superadmin/dailyreport', 'Report\ReportController@superadmin_dailyreport');
Route::get('/superadmin/monthlyreport', 'Report\ReportController@superadmin_monthlyreport');

//Admin Report
Route::get('/dailyreport', 'Report\ReportController@dailyreport');
Route::get('/monthlyreport', 'Report\ReportController@monthlyreport');

