<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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
	if(Auth::check()){ return Redirect::to('home');}
    return view('auth.tandish');
});

Auth::routes(['verify' => true]);

/*Route::get('/terms_and_conditions', 'HomeController@show');*/

//Route::resource('/recipe', 'PostsController');
Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function (){

	//Recipe Index
	Route::get('/home', 'PostsController@index');

	//Recipe Create, Edit, Update, Delete
	Route::get('/recipe', 'PostsController@create');
	Route::resource('r', 'PostsController');

	//Profile Create, Edit, Update, Delete
	Route::resource('p', 'ProfilesController');
	Route::get('/user/posts/{id}', 'ProfilesController@posts');

	//CookBook
	Route::resource('/cookbook', 'CookbooksController');
	Route::get('/user/cookbooks/{id}', 'CookbooksController@posts');

	//Bookmark
	Route::resource('/bookmark', 'BookmarksController');

	//Made This
	Route::resource('/made', 'MadesController');

	//Search
	Route::get('/search',['uses' => 'SearchController@getSearch','as' => 'search']);

	//Settings
	Route::get('/settings', 'SettingsController@index')->name('settings');

	//Feedback
	Route::get('/help', 'FeedbacksController@index')->name('feedbacks');
 
	Route::post('follow', 'ProfilesController@follwUserRequest')->name('follow');

});

