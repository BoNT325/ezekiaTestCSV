<?php

use Illuminate\Support\Facades\Route;
use App\candidate;

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

Route::get('/load', 'databaseController@parseCandidates' );
Route::get('/jobs', 'databaseController@parseJobs');

Route::get('/', function () {


});
