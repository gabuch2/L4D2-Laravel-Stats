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

Route::get('/', 'App\Http\Controllers\StatsController@playersonline')->name('stats.online');
Route::get('/playerlist', 'App\Http\Controllers\StatsController@ranking')->name('stats.ranking');
Route::get('/player', 'App\Http\Controllers\StatsController@player_stats')->name('stats.individual');
Route::get('/server', 'App\Http\Controllers\StatsController@server_stats')->name('stats.server');
Route::get('/awards', 'App\Http\Controllers\StatsController@server_awards')->name('stats.awards');