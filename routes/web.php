<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\CarouselCrudController;
use App\Http\Controllers\CatalogCrudController;
use App\Http\Controllers\CatalogsTableController;
use App\Http\Controllers\CarouselTableController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user/layout');
// });

Route::get('/', [LayoutController::class, 'index'])->name('user.index');
Route::get('/login', [LoginController::class, 'index'])->name('admin.index');
Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.index');
Route::get('/carouselform', [CarouselCrudController::class, 'index'])->name('admin.index');
Route::get('/catalogform', [CatalogCrudController::class, 'index'])->name('admin.index');
Route::get('/carouseltable', [CarouselTableController::class, 'index'])->name('admin.index');
Route::get('/catalogtable', [CatalogsTableController::class, 'index'])->name('admin.index');
Route::get('/dashboard/catalogs/{id}', [CatalogCrudController::class, 'edit'])->name('catalogs.edit');
Route::get('/dashboard/carousel/{id}', [CarouselCrudController::class, 'edit'])->name('carousel.edit');