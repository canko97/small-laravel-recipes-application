<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\RecipesController;
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
Route::get('/italian', 'PagesController@italian');
//Route::get('/new', 'PagesController@newRecipe');
//Route::post('/new', 'PagesController@saveRecipe')->name('createrecipe');
Route::get('/food/{id}','PagesController@food');
Route::get('/foodpdf/{id}', 'PagesController@foodpdf');
Route::get('/users/create', 'PagesController@createUser');
Route::post('/users/create', 'PagesController@saveUser')->name('createuser');
Route::get('/profile', 'PagesController@profile')->middleware('auth');
Route::post('profile', 'PagesController@updateAvatar');
//Route::get('/food/{id}/edit', 'PagesController@editRecipe');
//Route::post('/food/{id}/edit', 'PagesController@updateRecipe')->name('updaterecipe');
//Route::post('/food/{id}/delete', 'PagesController@deleteRecipe')->name('deleterecipe');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/recipes', 'RecipesController@index');
Route::post('/recipes','RecipesController@store')->name('createrecipe');
Route::get('/recipes/create', 'RecipesController@create');
Route::get('/recipes/{recipe}', 'RecipesController@show');
Route::get('/recipes/{recipe}/edit', 'RecipesController@edit');
Route::put('/recipes/{recipe}', 'RecipesController@update')->name('editrecipe');
Route::delete('/recipes/{recipe}', 'RecipesController@destroy')->name('deleterecipe');

