<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Custom classes we created for application
use App\Article;
use App\Auth;

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
/* 
HTTP Status Codes and the Response Format 
 *****************************************
200: OK. The standard success code and default option.
201: Object created. Useful for the store actions.
204: No content. When an action was executed successfully, but there is no content to return.
206: Partial content. Useful when you have to return a paginated list of resources.
400: Bad request. The standard option for requests that fail to pass validation.
401: Unauthorized. The user needs to be authenticated.
403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.
404: Not found. This will be returned automatically by Laravel when the resource is not found.
500: Internal server error. Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.
503: Service unavailable. Pretty self explanatory, but also another code that is not going to be returned explicitly by the application.
 */

//We can improve the endpoints by using implicit route model binding. 
//This way, Laravel will inject the Article instance in our methods and automatically return a 404 if it isn’t found.

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('articles', 'ArticleController@index');
    Route::get('articles/{id}', 'ArticleController@show');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{id}', 'ArticleController@update');
    Route::delete('articles/{id}', 'ArticleController@delete');
}); 

// Route::post('register', 'Auth\RegisterController@register');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout');

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('get-details', 'API\PassportController@getDetails');
});

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });