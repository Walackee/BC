<?php

use App\Http\Controllers\Api\PocketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PocketResourceController;

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

Route::patch('pockets/mass_update', [PocketController::class, 'massUpdatePockets']);
Route::get('pockets/download_csv', [PocketController::class, 'downloadCsv']);
Route::apiResource('pockets', PocketResourceController::class);

