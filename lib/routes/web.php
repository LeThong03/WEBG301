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

use App\Http\Controllers\CustomerAuthController;

Route::get('/', 'FrontendController@getHome');

Route::get('/customerlogin',[CustomerAuthController::class,'customerlogin']);

Route::get('/registration',[CustomerAuthController::class,'registration']);

Route::post('/register-user',[CustomerAuthController::class,'registerUser'])->name('register-user');

Route::post('/login-user',[CustomerAuthController::class,'loginUser'])->name('login-user');

Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');

Route::post('detail/{id}/{slug}.html','FrontendController@postComment');

Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::get('/dashboard',[CustomerAuthController::class,'dashboard']);
Route::get('/dashboard/edit/{id}',[CustomerAuthController::class,'edit']);
Route::post('/dashboard/update',[CustomerAuthController::class,'update']);

Route::group(['namespace'=>'Admin'], function(){
    Route::group(['prefix'=>'login','middleware'=>'CheckLogIn'], function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });

    Route::get('logout','HomeController@getLogout');

    Route::group(['prefix'=>'admin','middleware'=>'CheckLogOut'],function(){
        Route::get('home', 'HomeController@getHome');

        Route::group(['prefix'=>'category'],function(){
            Route::get('/','CategoryController@getCate');

            Route::post('/','CategoryController@postCate');

            Route::get('edit/{id}','CategoryController@getEditCate');

            Route::post('edit/{id}','CategoryController@postEditCate');

            Route::get('delete/{id}','CategoryController@getDeleteCate');
        });

        Route::group(['prefix'=>'product'],function(){
            Route::get('/','ProductController@getProduct');

            Route::get('add','ProductController@getAddProduct');

            Route::post('add','ProductController@postAddProduct');

            Route::get('edit/{id}','ProductController@getEditProduct');

            Route::post('edit/{id}','ProductController@postEditProduct');

            Route::get('delete/{id}','ProductController@getDeleteProduct');
        });
        Route::group(['prefix'=>'accessories'],function(){
            Route::get('/','AccessoriesController@getAcc');

            Route::post('/','AccessoriesController@postAcc');

            Route::get('edit/{id}','AccessoriesController@getEditAcc');

            Route::post('edit/{id}','AccessoriesController@postEditAcc');

            Route::get('delete/{id}','AccessoriesController@getDeleteAcc');
        });

        Route::group(['prefix'=>'components'],function(){
            Route::get('/','ComponentsController@getComp');

            Route::post('/','ComponentsController@postComp');

            Route::get('edit/{id}','ComponentsController@getEditComp');

            Route::post('edit/{id}','ComponentsController@postEditComp');

            Route::get('delete/{id}','ComponentsController@getDeleteComp');  
        });
    });
});
