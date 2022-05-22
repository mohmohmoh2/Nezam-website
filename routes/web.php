<?php

use App\Http\Controllers\Front\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesPageController;
use App\Http\Controllers\SocialiteController;

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

Route::get('/', 'App\Http\Controllers\Front\HomePageController@index' )->name('front.homepage');

Route::get('/login', 'App\Http\Controllers\Admin\AuthPageController@index' )->name('admin.Auth');

Route::get('/google', 'App\Http\Controllers\Admin\AuthPageController@google' )->name('google.Auth');

Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])
    ->where('provider', 'github|google');

Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])
    ->where('provider', 'github|google');

Route::get('/facebook', 'App\Http\Controllers\Admin\AuthPageController@redirect' )->name('admin.redirect');
Route::get('/facebookcall', 'App\Http\Controllers\Admin\AuthPageController@callback' )->name('admin.callback');
Route::post('/login', 'App\Http\Controllers\Admin\AuthPageController@login' )->name('admin.login');
Route::post('/edit', 'App\Http\Controllers\Front\HomePageController@edit' )->name('admin.edit');
Route::get('/reset', 'App\Http\Controllers\reset@index' )->name('admin.reset');
Route::get('/code', 'App\Http\Controllers\reset@code' )->name('admin.code');
Route::get('/freset/{id}', 'App\Http\Controllers\reset@reset' )->name('reset');

Route::get('/ereset', 'App\Http\Controllers\reset@emailcheck' )->name('admin.ereset');
Route::get('/ecode', 'App\Http\Controllers\reset@codecheck' )->name('admin.ecode');
Route::get('/reset', 'App\Http\Controllers\reset@codecheck' )->name('admin.ecode');


Route::get('/signUp', 'App\Http\Controllers\Admin\AuthPageController@signUpView' )->name('front.signUp');
Route::post('/signUp', 'App\Http\Controllers\Admin\AuthPageController@signUp' )->name('admin.signUp');
Route::get('/Courses/{id}', 'App\Http\Controllers\CoursesPageController@index' )->name('frdont.Courases');



Route::middleware('admin')->group(function (){
    # code...
    Route::get('/admin', 'App\Http\Controllers\admin\AdminPageController@index')->name('admin');
    Route::post('/add','App\Http\Controllers\admin\AdminPageController@Lectures')->name('admin.add');
    Route::post('/addcat','App\Http\Controllers\admin\AdminPageController@addcat')->name('admin.addcat');
    // Edit Options
    Route::get('/editCourse/{id}','App\Http\Controllers\admin\AdminPageController@editCourse')->name('admin.editCourse');
    Route::post('/editQuiz/{id}','App\Http\Controllers\admin\AdminPageController@editQuiz')->name('admin.editQuiz');
    Route::post('/editLecture/{id}','App\Http\Controllers\admin\AdminPageController@editLecture')->name('admin.editLecture');
    Route::post('/editsett','App\Http\Controllers\admin\AdminPageController@editsett')->name('admin.editsett');

    // Delete Route Functions
    Route::get('/delCourse/{id}','App\Http\Controllers\admin\AdminPageController@delCourse')->name('admin.delCourse');
    Route::get('/delQuiz/{id}','App\Http\Controllers\admin\AdminPageController@delQuiz')->name('admin.delQuiz');
    Route::get('/delLec/{id}','App\Http\Controllers\admin\AdminPageController@delLec')->name('admin.delLec');
    Route::get('/delInstructor/{id}','App\Http\Controllers\admin\AdminPageController@delInstructor')->name('admin.delInstructor');


    Route::post('/instructor', 'App\Http\Controllers\admin\AdminPageController@Instructor')->name('admin.add.instructor');
    Route::post('/instructors', 'App\Http\Controllers\admin\AdminPageController@Lectures')->name('admin.add.lec');
    Route::post('/course', 'App\Http\Controllers\admin\AdminPageController@Courses')->name('admin.course');    

});


Route::middleware('login')->group(function (){
    # code...
    Route::get('/Profile', 'App\Http\Controllers\Front\HomePageController@profile' )->name('front.Profile');

    Route::post('/quiz', 'App\Http\Controllers\admin\AdminPageController@quiz')->name('admin.quiz');
    Route::post('/squiz', 'App\Http\Controllers\admin\AdminPageController@submit')->name('admin.squiz');
    Route::get('/logout', 'App\Http\Controllers\Admin\AuthPageController@logout' )->name('admin.logout');
    Route::get('/gen/{id}', 'App\Http\Controllers\generateController@generate' )->name('admin.gen');
    
    Route::get('/enroll/{id}', 'App\Http\Controllers\Front\HomePageController@enroll')->name('enroll');
    Route::get('/Courses/{id}/{lid}', 'App\Http\Controllers\Front\HomePageController@Lectures')->name('front.lecture');
    

});

