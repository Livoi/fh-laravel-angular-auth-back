<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::middleware('auth:api')->get('/token/revoke', function (Request $request) {
    DB::table('oauth_access_tokens')
        ->where('user_id', $request->user()->id)
        ->update([
            'revoked' => true
        ]);
    return response()->json('DONE');
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

Route::delete('/deletegrant/{id}', [
  'uses' => 'GrantController@deleteGrant'
]);
