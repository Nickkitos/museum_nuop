<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArtifactController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\CollectionsController;
use App\Http\Controllers\Admin\FacultyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\MainController@welcome');

Route::get('collections', 'App\Http\Controllers\MainController@collections');

Route::get('map', 'App\Http\Controllers\MainController@map');

Route::get('about', 'App\Http\Controllers\MainController@about');

Route::get('news/{id}', 'App\Http\Controllers\HomeController@news');

Route::get('artifact/{id}', 'App\Http\Controllers\HomeController@artifact');

Route::get('faculty/{id}', 'App\Http\Controllers\HomeController@faculty');


Route::middleware(['role:manager|admin'])->prefix('admin_panel')->group(function (){
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->name('homeAdmin');
    Route::get('/admin_panel/artifact/{id}/pdf', 'App\Http\Controllers\Admin\ArtifactController@generatePdf')->name('artifact.pdf');

    Route::resource('users', UsersController::class);
    Route::resource('news', NewsController::class);
    Route::resource('files', FilesController::class);
    Route::resource('about', AboutController::class);
    Route::resource('artifact', ArtifactController::class);
    Route::resource('groups', GroupsController::class);
    Route::resource('departments', DepartmentsController::class);
    Route::resource('collections', CollectionsController::class);
    Route::resource('faculty', FacultyController::class);
});

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function (){

    Route::resource('users', UsersController::class);
});


 /* Auth::routes(); */

// Додайте окремі маршрути для авторизації
Route::get('door', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('door', 'App\Http\Controllers\Auth\LoginController@login');

Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::any('register', function () {
    abort(404);
}); 

Route::any('login', function () {
    abort(404);
});
