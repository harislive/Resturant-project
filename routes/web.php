<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\FrontendMenuController;
use App\Http\Controllers\Frontend\FrontendReservationController;
use App\Http\Controllers\Frontend\WellcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// front end Controllers
Route::get('/',[WellcomeController::class,'index']);

Route::get('/categories',[FrontendCategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{category}',[FrontendCategoryController::class,'show'])->name('categories.show');
Route::get('/menus',[FrontendMenuController::class,'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WellcomeController::class, 'thankyou'])->name('thankyou');







// Dashboard contrllers
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function ()
{
    route::get('/',[AdminController::class,'index'])->name('index');
    route::resource('/category',CategoryController::class);
    route::resource('/menu',MenuController::class);
    route::resource('/reservation',ReservationController::class);
    route::resource('/table',TableController::class);
});
require __DIR__.'/auth.php';
