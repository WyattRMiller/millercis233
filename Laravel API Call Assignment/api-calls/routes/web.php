<?php

use Illuminate\Support\Facades\Route;
use App\Models\TvMazeAPI;

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

Route::get('/load-episodes', function () {
    $showNumber = intval(request()->query('showNumber'));
    $showNumber = $showNumber < 1 ? 1 : $showNumber;

    $episodes = TvMazeAPI::fetch($showNumber);
    return view('episodes', ['episodes' => $episodes]);
});

Route::get('/view-episodes', function () {
    $showNumber = intval(request()->query('showNumber'));
    $showNumber = $showNumber < 1 ? 1 : $showNumber;

    $episodes = TvMazeAPI::fetch($showNumber);
    return view('episodes', ['episodes' => $episodes]);
});

Route::get('/', function () {
    return view('welcome');
});