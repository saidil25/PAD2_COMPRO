<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardCatalogController;
use App\Http\Controllers\DashboardCarouselController;

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

Route::get('/catalogs', [CatalogController::class, 'index']);
Route::get('/catalogs/{id}', [CatalogController::class, 'show']);
Route::get('/carousel', [CarouselController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/token-info', [AuthenticationController::class, 'tokenInfo']);

    Route::get('/dashboard/catalogs', [DashboardCatalogController::class, 'index']);
    Route::get('/dashboard/catalogs/{id}', [DashboardCatalogController::class, 'show']);
    Route::get('/dashboard/carousel', [DashboardCarouselController::class, 'index']);
    
    Route::post('/dashboard/catalogs', [DashboardCatalogController::class, 'store']);
    Route::put('/dashboard/catalogs/{id}', [DashboardCatalogController::class, 'update'])->middleware('post-owner');
    Route::delete('/dashboard/catalogs/{id}', [DashboardCatalogController::class, 'destroy'])->middleware('post-owner');

    Route::post('/dashboard/carousel', [DashboardCarouselController::class, 'store']);
    Route::put('/dashboard/carousel/{id}', [DashboardCarouselController::class, 'update']);
    Route::delete('/dashboard/carousel/{id}', [DashboardCarouselController::class, 'destroy']);
});



