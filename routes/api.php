<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdContactController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * For AdContact
 */
Route::get('/adcontacts',[ContactController::class, 'adcontact']);

/**
 * For Update contacts
 */
Route::get('/updatecontacts/{contact}', [AdContactController::class, 'update']);

/**
 * For Favorite Function,wood
 */
Route::post('/add-to-favorites', [FavoriteController::class, 'addToFavorites']);

/**
 * For Favorite Function,tank
 */
Route::post('/add-to-favorites-tank', [FavoriteController::class, 'addToFavoritesTank']);

/**
 * For Favorite Function,stone
 */
Route::post('/add-to-favorites-stone', [FavoriteController::class, 'addToFavoritesStone']);


/**
 * For Favorite Function,plant
 */
Route::post('/add-to-favorites-plant', [FavoriteController::class, 'addToFavoritesPlant']);

/**
 * For Favorite Function,product
 */
Route::post('/add-to-favorites-product', [FavoriteController::class, 'addToFavoritesProduct']);

