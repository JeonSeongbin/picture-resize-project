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
\Artisan::call('cache:clear');
Route::get('/', function () {
  return view('Auth.login');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::post("/imageUpload","HomeController@imageUpload")->name('imageUpload');
Route::post("/complete","Complete@initialize")->name("complete");//해당 URL을 name으로 치환 해서 보르겠다는 뜻 같이 두면 될듯
Route::post("/download","Complete@download")->name("download");//해당 URL을 name으로 치환 해서 보르겠다는 뜻 같이 두면 될듯