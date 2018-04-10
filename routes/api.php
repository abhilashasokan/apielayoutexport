<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Custom classes we created for application
Use App\Article;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* The routes inside api.php will be prefixed with /api/ and the API throttling middleware will be automatically applied to these routes */

//We can improve the endpoints by using implicit route model binding. 
//This way, Laravel will inject the Article instance in our methods and automatically return a 404 if it isn’t found.
Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');
