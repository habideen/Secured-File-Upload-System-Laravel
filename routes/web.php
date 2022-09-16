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



// Route::get('/', 'PageController@index');
// Route::get('/coupon', 'PageController@coupon');
// Route::get('/signup', 'PageController@signup')->name('signup')->middleware('alreadyLoggedIn');
// Route::post('/signup', 'Auth\AuthController@signup')->name('signup');
// Route::get('/login', 'PageController@login')->name('login')->middleware('alreadyLoggedIn');
// Route::post('/login', 'Auth\AuthController@login')->name('login');
// Route::post('/password', 'Auth\AuthController@update_password')->name('password');


Route::get('/', 'PageController@index');
Route::get('/privacy_policy', 'PageController@privacy_policy')->name('privacy_policy');;
Route::get('/contact_us', 'PageController@contact_us')->name('contact_us');;
Route::get('/about_us', 'PageController@about_us')->name('about_us');
Route::get('/login', 'PageController@login')->name('login')->middleware('alreadyLoggedIn');
Route::post('/login', 'Auth\AuthController@login')->name('login');
Route::get('/signout', 'Auth\AuthController@signout')->name('signout');
Route::post('/password', 'Auth\AuthController@update_password')->name('password');
Route::get('/forgot_password', 'PageController@forgot_password')->name('forgot_password');
Route::post('/forgot_password', 'Auth\AuthController@forgot_password')->name('forgot_password');
Route::post('/emails_mail', 'Auth\AuthController@emails_mail')->name('emails.mail');


Route::get('/upload/login/{url_code}', 'User\FileTransferController@upload_login')->name('upload.login');
Route::post('/upload/login/{url_code}', 'User\FileTransferController@verify_code')->name('upload.login');
Route::get('/upload/add_file/{url_code}', 'User\FileTransferController@push_page')->name('upload.add_file');
Route::post('/upload/push', 'User\FileTransferController@push_file')->name('upload.push');
Route::post('/upload/delete', 'User\FileTransferController@delete_file')->name('upload.delete');
Route::post('/upload/submit', 'User\FileTransferController@submit_file')->name('upload.submit');
Route::get('/upload/download/{transfer_id}', 'User\FileTransferController@download_file')->name('upload.download');



Route::prefix('admin')->middleware('isAdminLoggedIn')->group(function () {

    Route::get('/index', 'Admin\AdminController@index')->name('admin.index');

    Route::get('/clients', 'Admin\AdminController@all_clients')->name('admin.clients');
    Route::get('/client_file_transfer/{id}', 'Admin\AdminController@client_file_transfer')->name('admin.client_file_transfer');

    Route::get('/manage_users', 'Admin\ManageUsersController@index')->name('manage_users');
    Route::post('/manage_users', 'Admin\ManageUsersController@register_user')->name('manage_users');
    Route::post('/update_system_user', 'Admin\ManageUsersController@update_system_user')->name('update_system_user');
    Route::get('/update_user_status', 'Admin\ManageUsersController@update_user_status')->name('update_user_status');

    Route::get('/profile', 'Common\ProfileController@index');
    Route::post('/update_profile', 'Common\ProfileController@update_profile')->name('admin.update_profile');    
    Route::post('/update_profile_passport', 'Common\ProfileController@update_profile_passport')->name('admin.update_profile_passport');

    Route::get('/password', 'Common\PasswordController@index');

});



Route::prefix('user')->middleware('isUserLoggedIn')->group(function () {

    Route::get('/index', 'User\UserController@index')->name('user.index');

    Route::get('/profile', 'Common\ProfileController@index');
    Route::post('/update_profile', 'Common\ProfileController@update_profile')->name('user.update_profile');    
    Route::post('/update_profile_passport', 'Common\ProfileController@update_profile_passport')->name('user.update_profile_passport');
    
    Route::get('/password', 'Common\PasswordController@index');

    Route::get('/manage_client', 'User\ManageClientController@index')->name('manage_client');
    Route::post('/manage_client', 'User\ManageClientController@register_client')->name('manage_client');
    Route::post('/update_client', 'User\ManageClientController@update_client')->name('update_client');
    Route::get('/all_clients', 'User\ManageClientController@all_clients')->name('all_clients');

    Route::get('/client_file_transfer/{id}', 'User\FileTransferController@index')->name('client_file_transfer');
    Route::post('/client_file_transfer', 'User\FileTransferController@generate_transfer_link')->name('client_file_transfer');

});