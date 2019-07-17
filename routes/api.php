<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    
    Route::post('login', 'PassportController@login');
    Route::post('register', 'PassportController@register');
    
    Route::middleware(['auth:api', 'acceptJson'])->group(function () {
        Route::apiResource('meetings', 'MeetingController');
        Route::apiResource('users', 'UserController');
        Route::get('user', 'PassportController@details');
        Route::patch('meetings/{meeting}/likes', 'MeetingLikesController@likes');
        Route::post('/meetings/{meeting}/agendas', 'MeetingAgendasController@store');


    });
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Resource Not Found. If error persists, contact admin'
    ], 404);
});