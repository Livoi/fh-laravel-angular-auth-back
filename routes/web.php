<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::post('/savegrant', [
    'uses' => 'GrantController@saveGrantData'
  ]);
  
  Route::get('/getgrant/{id}', [
    'uses' => 'GrantController@getGrantData'
  ]);
  
  Route::put('/updategrant/{id}', [
    'uses' => 'GrantController@updateGrantData'
  ]);
  
  Route::get('/', [
    'uses' => 'GrantController@loadGrants'
  ]);
  
  Route::delete('/deleteGrant/{id}', [
    'uses' => 'GrantController@deleteGrant'
  ]);