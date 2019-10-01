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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function (){

    Route::get('init','AppController@init');
    Route::post('login','AppController@login');
    Route::post('register','AppController@register');
    Route::post('logout','AppController@logout');
});

Route::get('add-notification', function() {
    broadcast(new \App\Events\ShowDialogEvent);
    return 'Bildirim Gönderildi.';
});

Route::group(['middleware' => ['AuthCheck']],function(){
    Route::post('/sendMessage','AppController@addMessage');
    Route::get('/getMessageList','AppController@getMessageList');

});

