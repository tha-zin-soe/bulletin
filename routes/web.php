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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth']],function(){
    Route::get('logout','Auth\LoginController@logout')->name('logout');
//user
Route::get('home_page','UserController@index')->name('home_page');
Route::get('contact_page','UserController@contact_page')->name('contact_page');
Route::get('user_profilepage','UserController@user_profilepage')->name('user_profilepage');
//looknew
Route::get('look_newInfo/{id}','UserController@look_newInfo')->name('look_newInfo');
//crete news
Route::post('insert_new','UserController@insert_new')->name('insert_new');
//insert contact
Route::post('insert_contact','UserController@insert_contact')->name('insert_contact');
Route::get('delete_new/{id}','UserController@delete_new')->name('delete_new')->middleware('checkPremium');
Route::post('update_new','UserController@update_new')->name('update_new')->middleware('checkPremium');
Route::post('update_account','UserController@update_account')->name('update_account');
Route::post('user_change_password','UserController@user_change_password')->name('user_change_password');

//admin
Route::group(['middleware'=> ['checkAdmin']],function(){
    Route::get('admin_page','AdminController@index')->name('admin_page');
    Route::get('profile','AdminController@profile')->name('profile');
    
    Route::get('contact_list','AdminController@contact_list')->name('contact_list');
    Route::get('manage_premium','AdminController@manage_premium')->name('manage_premium');
    //contact list delete
    Route::get('delete_contact/{id}','AdminController@delete_contact')->name('delete_contact');
    Route::get('update_contact/{id}','AdminController@update_contact')->name('update_contact');
    Route::post('contact_update','AdminController@contact_update')->name('contact_update');
    Route::get('delete_premium/{id}','AdminController@delete_premium')->name('delete_premium');
    Route::get('user_update/{id}','AdminController@user_update')->name('user_update');
    Route::post('update_user','AdminController@update_user')->name('update_user');
    //update admin profile
    Route::post('update_admin_profile','AdminController@update_admin_profile')->name('update_admin_profile');
    Route::post('admin_change_password','AdminController@admin_change_password')->name('admin_change_password');
    
    });

});

