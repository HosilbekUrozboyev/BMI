<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuListController;
use App\Http\Controllers\OshpazController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetsepController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseOperationController;
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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('admin.master');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('menulist', [MenuListController::class, 'index'])->name('menu_list');

Route::middleware('auth')->group(function () {
    Route::resource('days', DayController::class);
    Route::get('statistic', [StatisticController::class, 'index'])->name('statistic.index')->middleware('zouch');
    Route::resource('warehouse-operations', WarehouseOperationController::class)->middleware('zouch');
    Route::resource('users', UserController::class)->middleware('admin_zouch');
    Route::resource('children', ChildrenController::class)->middleware('admin');
    Route::resource('groups', GroupController::class)->middleware('zouch');
    Route::resource('menu', MenuController::class)->middleware('zouch');
    Route::resource('retsep', RetsepController::class)->middleware('zouch');
    Route::resource('warehouse', WarehouseController::class)->middleware('zouch');
    Route::resource('foods', FoodController::class)->middleware('zouch');
    Route::resource('attendance', AttendanceController::class);
    Route::get('davomat',[OshpazController::class,'index'])->middleware('oshpaz')->name('davomat');
    Route::get('warehouselist',[OshpazController::class,'store'])->middleware('oshpaz')->name('warehouse_list');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
