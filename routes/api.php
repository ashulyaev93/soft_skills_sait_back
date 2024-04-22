<?php

use App\Application\Controllers\Admin\PostController;
use App\Application\Controllers\Admin\CategoryController;
use App\Application\Controllers\Admin\TagController;
use App\Application\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Application\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['prefix' => '/admin', 'middleware' => 'jwt.auth'], function () {
    Route::get('/post', [PostController::class, 'getAll']);
    Route::post('/post/add', [PostController::class, 'create']);
    Route::patch('/post/update', [PostController::class, 'update']);
    Route::get('/category', [CategoryController::class, 'getAll']);
    Route::post('/category/add', [CategoryController::class, 'add']);
    Route::patch('/category/update', [CategoryController::class, 'update']);
    Route::get('/tag', [TagController::class, 'getAll']);
    Route::post('/tag/add', [TagController::class, 'add']);
    Route::patch('/tag/update', [TagController::class, 'update']);
});




