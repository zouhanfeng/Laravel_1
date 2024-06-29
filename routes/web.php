<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\YoutuberController;

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

/*//---------------------------'users/{id}/hello/{abc}'-------------------------------------------------

Route::get('users/{id}/hello/{abc}', function ($id,$abc) {

    return $id."  ".view('welcome')."".$abc;

})->where(['id'=>'[0-9]+','abc'=>'[A-Z][a-z]+']);   //----------('[A-Z][a-z]+')!=('[A-Za-z]+')

?	未出現或出現一次
*	未出現或出現多次
+	出現一次或多次
[A-Z][a-z]*表示一個大寫字母然後0個或多個小寫字母
[A-Za-z]*是 0 個或多個任字母
//-----------------------------'users/{id?}/hello/'-----------------------------------------------

Route::get('users/hello/{id?}', function ($id=41) {

    return $id."  ".view('welcome');

})->where(['id'=>'[0-9]+']); //where('id','[0-9]+');*/


//-----------------------------'/'-----------------------------------------------

Route::get('/', function () {
    return view('welcome');
 })->name('welcome');



//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//----------------------------'/channels/index'------------------------------------------------
//同樣的路由(/channels/xxx)或路徑(\App\Http\Controllers\ChannelsController@index)前綴詞可使用group
/*Route::prefix('channels')->group(function(){
    Route::get('/',function (){
        //....
    });
    Route::get('/',function (){
        //....
    });  */
Route::get('/channels',[ChannelsController::class,'index'])->name('channels');//function () {return view('channels.index');}    '\App\Http\Controllers\ChannelsController@index')

//----------------------------'/channels/creat'------------------------------------------------
Route::get('/channels/create',[ChannelsController::class,'creat'] )->name('c_create');

//----------------------------'/channels/edit'------------------------------------------------
Route::get('/channels/{id}/edit',[ChannelsController::class,'edit'])->name('c_edit')->where(['id'=>'[0-9]+']);


//----------------------------'/channels/update'------------------------------------------------

Route::patch('channels/update/{id}', [ChannelsController::class, 'update'])->where('id', '[0-9]+')->name('c_update');

//----------------------------'/channels/show'------------------------------------------------
Route::get('/channels/{id}',[ChannelsController::class,'show'])->name('c_show')->where(['id'=>'[0-9]+']);

//----------------------------'/channels/destory'------------------------------------------------
Route::delete('channels/delete/{id}', [ChannelsController::class, 'destroy'])->where('id', '[0-9]+')->name('c_destroy');

//----------------------------'/channels/asia'------------------------------------------------
Route::get('/channels/asia',[ChannelsController::class,'Asia'])->name('c_asia');

//----------------------------'/channels/others'------------------------------------------------
Route::get('/channels/others',[ChannelsController::class,'Others'])->name('c_others');

//----------------------------'/channels/store'------------------------------------------------
Route::post('/channels/store',[ChannelsController::class,'store'])->name('c_store');


Route::get('/getCSRFToken', function() { return csrf_token(); }); // csrf = cross-site request forgery (跨站請求偽造)

//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//----------------------------'/youtuber/index'------------------------------------------------
Route::get('/youtubers',[YoutuberController::class,'index'])->name('youtubers');

//-------------------------------'/youtuber/creat'---------------------------------------------
Route::get('/youtubers/create', [YoutuberController::class,'creat'])->name('y_create');

//-------------------------------'/youtuber/store'---------------------------------------------
Route::post('youtubers/store', [YoutuberController::class, 'store'])->name('y_.store');

//----------------------------'/youtuber/edit'------------------------------------------------
Route::get('/youtubers/{id}/edit',[YoutuberController::class,'edit'])->name('y_edit')->where(['id'=>'[0-9]+']);

//----------------------------'/youtuber/update'------------------------------------------------
Route::patch('youtubers/update/{id}', [YoutuberController::class, 'update'])->where('id', '[0-9]+')->name('y_update');

//----------------------------'/youtuber/show'------------------------------------------------
Route::get('/youtubers/{id}',[YoutuberController::class ,'show'])->name('y_show')->where(['id'=>'[0-9]+']);

//----------------------------'/youtuber/destory'------------------------------------------------
Route::delete('youtubers/delete/{id}', [YoutuberController::class, 'destroy'])->where('id', '[0-9]+')->name('y_destroy');

//----------------------------'/youtuber/senior'------------------------------------------------
Route::get('youtubers/senior', [YoutuberController::class, 'senior'])->name('y_senior');

//----------------------------'/youtuber/country'------------------------------------------------
Route::post('youtubers/country', [YoutuberController::class, 'country'])->name('country');
