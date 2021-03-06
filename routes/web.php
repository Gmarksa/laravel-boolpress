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

Route::get('contacts', "PageController@contacts")->name('contacts');
Route::post('contacts', "PageController@send")->name('contacts.send');

/* Guest Routes */

Route::get('/', "PostController@index");
Route::resource("posts", PostController::class)->only(['index','show']);

Auth::routes();

/* Admin Routes */

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
});


/* Vue */
Route::get('vue-post', function() {
    return view('vue-post');
});