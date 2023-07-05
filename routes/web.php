<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\Authenticate;
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

Route::get('/', [FrontendController::class, 'homePage'])->name('homepage');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cuisine',CuisineController::class)->middleware(Authenticate::class);

Route::get('/cuisine/{id}/view',[FrontendController::class, 'show'])->name('cuisine.view');

Route::get('/user/edit/{id}',[FrontendController::class, 'edit'])->name('edit.user');

Route::put('/user/update/{id}',[FrontendController::class, 'update'])->name('update.user');