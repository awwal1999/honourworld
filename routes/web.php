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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function () {
    Route::get('meetings/create', 'MeetingController@create')->name('admin.meetings.create');
    Route::get('meetings', 'MeetingController@index');
    Route::post('meetings/store', 'MeetingController@store')->name('admin.meetings.store');
    Route::get('meetings/{meeting}', 'MeetingController@view')->name('admin.meetings.view');
    Route::get('meetings/{meeting}/edit', 'MeetingController@edit')->name('admin.meetings.edit');
    Route::patch('meetings/{meeting}/update', 'MeetingController@update')->name('admin.meetings.update');

    Route::patch('meetings/{meeting}/agendas/{agenda}', 'MeetingAgendaController@update')->name('admin.agenda.update');
});
