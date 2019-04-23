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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/users',                                  'Admin\UsersController@index');
    Route::get('/admin/users/create',                           'Admin\UsersController@create');
    Route::post('/admin/users',                                 'Admin\UsersController@store');
    Route::get('/admin/users/{user}/edit',                      'Admin\UsersController@edit')->name('admin/users/edit');
    Route::post('/admin/users/{user}',                          'Admin\UsersController@update')->name('admin/users/update');
    Route::delete('/admin/users/{user}',                        'Admin\UsersController@destroy')->name('admin/users/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/customers',                              'Admin\CustomersController@index');
    Route::get('/admin/customers/create',                       'Admin\CustomersController@create');
    Route::post('/admin/customers',                             'Admin\CustomersController@store');
    Route::get('/admin/customers/{customer}/edit',              'Admin\CustomersController@edit')->name('admin/customers/edit');
    Route::post('/admin/customers/{customer}',                  'Admin\CustomersController@update')->name('admin/customers/update');
    Route::delete('/admin/customers/{customer}',                'Admin\CustomersController@destroy')->name('admin/customers/destroy');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/companies',                              'Admin\CompaniesController@index');
    Route::get('/admin/companies/create',                       'Admin\CompaniesController@create');
    Route::post('/admin/companies',                             'Admin\CompaniesController@store');
    Route::get('/admin/companies/{company}/edit',               'Admin\CompaniesController@edit')->name('admin/companies/edit');
    Route::post('/admin/companies/{company}',                   'Admin\CompaniesController@update')->name('admin/companies/update');
    Route::delete('/admin/companies/{company}',                 'Admin\CompaniesController@destroy')->name('admin/companies/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/types',                                  'Admin\TypesController@index');
    Route::get('/admin/types/create',                           'Admin\TypesController@create');
    Route::post('/admin/types',                                 'Admin\TypesController@store');
    Route::get('/admin/types/{type}/edit',                      'Admin\TypesController@edit')->name('admin/types/edit');
    Route::post('/admin/types/{type}',                          'Admin\TypesController@update')->name('admin/types/update');
    Route::delete('/admin/types/{type}',                        'Admin\TypesController@destroy')->name('admin/types/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/services',                               'Admin\ServicesController@index');
    Route::get('/admin/services/create',                        'Admin\ServicesController@create');
    Route::post('/admin/services',                              'Admin\ServicesController@store');
    Route::get('/admin/services/{service}/edit',                'Admin\ServicesController@edit')->name('admin/services/edit');
    Route::post('/admin/services/{service}',                    'Admin\ServicesController@update')->name('admin/services/update');
    Route::delete('/admin/services/{service}',                  'Admin\ServicesController@destroy')->name('admin/services/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/categories',                             'Admin\CategoriesController@index');
    Route::get('/admin/categories/create',                      'Admin\CategoriesController@create');
    Route::post('/admin/categories',                            'Admin\CategoriesController@store');
    Route::get('/admin/categories/{category}/edit',             'Admin\CategoriesController@edit')->name('admin/categories/edit');
    Route::post('/admin/categories/{category}',                 'Admin\CategoriesController@update')->name('admin/categories/update');
    Route::delete('/admin/categories/{category}',               'Admin\CategoriesController@destroy')->name('admin/categories/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/menus',                                  'Admin\MenusController@index');
    Route::get('/admin/menus/create',                           'Admin\MenusController@create');
    Route::post('/admin/menus',                                 'Admin\MenusController@store');
    Route::get('/admin/menus/{menu}/edit',                      'Admin\MenusController@edit')->name('admin/menus/edit');
    Route::post('/admin/menus/{menu}',                          'Admin\MenusController@update')->name('admin/menus/update');
    Route::delete('/admin/menus/{menu}',                        'Admin\MenusController@destroy')->name('admin/menus/destroy');
});