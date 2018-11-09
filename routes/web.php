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

Route::get('/register','Userscontroller@RegisterForm')->name('register_form');
Route::post('/register','Userscontroller@UserRegister')->name('user_register');

Route::get('/admin_register','Userscontroller@Administrator')->name('admin_register');
Route::post('/admin_register','Userscontroller@AdministratorRegister')->name('admin_register_form_fill');

Route::get('/course_register','Userscontroller@CourseRegister')->name('course_register');
Route::post('/course_register','Userscontroller@StudentInfos')->name('course_register_fill');
Route::get('/reg_detail','Userscontroller@Regdetail')->name('reg_detail');
Route::get('/advisor_review','Userscontroller@AdvisorReview')->name('advisor_review');
Route::get('/advisor_accept/{id}','Userscontroller@AdvisorAccept')->name('advisor_accept');
Route::get('/provost_review','Userscontroller@ProvostReview')->name('provost_review');
Route::get('/provost_accept/{id}','Userscontroller@ProvostAccept')->name('provost_accept');
Route::get('/head_review','Userscontroller@HeadReview')->name('head_review');
Route::get('/head_accept/{id}','Userscontroller@HeadAccept')->name('head_accept');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
