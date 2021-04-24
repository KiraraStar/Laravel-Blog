<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\bgpController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::any('/',[HomeController::class,'index']); //主页
Route::any('/read/mirror',[HomeController::class, 'mirror']);

Route::any('/ad/login',[AdminController::class,'login']);

Route::group(['middleware'=>'admin'], function (){
    Route::any('/ad/main',[AdminController::class,'main']);
    Route::any('/ad/menu',[AdminController::class,'menu']);
    Route::any('/ad/artmake',[AdminController::class,'artMake']);
    Route::any('/ad/artmake/md',[AdminController::class,'artMakeMd']);
    Route::any('/ad/artlist',[AdminController::class,'artList']);
    Route::any('/ad/imgload',[AdminController::class,'imgLoad']);
    Route::any('/ad/imgshow',[AdminController::class,'imgShow']);
    Route::any('/ad/codemake',[AdminController::class,'codeMake']);
    Route::any('/ad/artchange/{id}',[AdminController::class,'artChange']);
    Route::any('/ad/artchange/md/{id}',[AdminController::class,'artChangeMd']);
});





Route::any('/art/{id}',[ArticleController::class,'articleShow']); //显示文章
Route::get('/to/api/{content}',[ApiController::class,'getApi']); //给code页面提供api
Route::get('/get/code',[ApiController::class,'getCode']);

Route::any('/bgp/show',[bgpController::class,'show']);
Route::any('/links',[bgpController::class,'links']);
