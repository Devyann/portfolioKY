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
Auth::routes();
/* Admin */
Route::middleware('auth')->prefix('admin')->group(function () {
    
    Route::get('/', 'BackOfficeController@index')->name('index_admin');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard_admin');
    Route::resource('pages', 'PagesController');
    Route::resource('headers', 'HeaderController');
    Route::resource('posts', 'PostController');
    Route::resource('images', 'ImageController');
});

/* app front end */
Route::get('/{any?}', function (){
    return view('vue');
})->where('any', '[\/\w\.-]*');



