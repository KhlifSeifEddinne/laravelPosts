<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PagesController@index');
route::get('/about', 'PagesController@about');
route::get('/services', 'PagesController@services');
route::get('/hello', 'PagesController@hello');
route::get('/users/25/saif', 'PagesController@conf');

/*route::get('/users/{id}/{name}', function($id,$name){
    return 'This user is: '.$name.', with id no: '.$id;
});*/

Route::resource('/posts', 'PostsController');
Route::resource('/editor', 'CKEDITOR');
Route::post('ckeditor/image_upload', 'CKEDITOR@upload')->name('upload');


Auth::routes();
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
