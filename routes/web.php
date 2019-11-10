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

// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/', 'HelloController@index');


Route::get('about-us', 'HelloController@about')->name('about');
Route::get('services', 'HelloController@services')->name('services');
Route::get('contact-us', 'HelloController@contact')->name('contact');



/* Category Crud are here */
Route::get('add-category', 'HiController@addCategory')->name('add_category');
Route::get('all-category', 'HiController@allCategory')->name('all_category');
Route::post('store-category', 'HiController@storeCategory')->name('store_category');
Route::get('view-category/{id}', 'HiController@viewCategory');
Route::get('delete-category/{id}', 'HiController@deleteCategory');
Route::get('edit-category/{id}', 'HiController@editCategory');
Route::post('update-category/{id}', 'HiController@updateCategory');

/* Post Crud Are Here */
Route::get('write-post', 'PostController@writePost')->name('write_post');
Route::post('store-Post', 'PostController@storePost')->name('store_post');
Route::get('all-post', 'PostController@allPost')->name('all_post');
Route::get('view-post/{id}', 'PostController@viewPost');
Route::get('edit-post/{id}', 'PostController@editPost');
Route::post('update-post/{id}', 'PostController@updatePost');
Route::get('delete-post/{id}', 'PostController@deletePost');

/* Students */
Route::get('students', 'StudentController@create')->name('students');
Route::post('store-Student', 'StudentController@store')->name('store_student');
Route::get('all-student', 'StudentController@index')->name('all_student');
Route::get('view-student/{id}', 'StudentController@show');
Route::get('delete-student/{id}', 'StudentController@destroy');
Route::get('edit-student/{id}', 'StudentController@edit');
Route::post('update-student/{id}', 'StudentController@update');





