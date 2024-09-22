<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\PrediksiKelulusan;
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

Route::get('/', [AuthController::class, 'Login'])->name('login_page');
Route::post('/login', [AuthController::class, 'Authenticate'])->name('login');

// ROUTE YANG AKAN ADA SETELAH LOGIN
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'Profile'])->name('profile');

Route::name('predict.')->prefix('/predict')->group(function () {
    Route::get('/list', [PrediksiKelulusan::class, 'PrediksiKelulusanView'])->name('list');
    Route::get('/add', [PrediksiKelulusan::class, 'PrediksiKelulusanAdd'])->name('add');
    Route::post('/post', [PrediksiKelulusan::class, 'PrediksiKelulusan'])->name('process');
});

Route::name('manage.')->prefix('/manage')->group(function () {
    Route::get('/user/list', [ManageController::class, 'Manage_User_List'])->name('user_list');
    Route::get('/user/add', [ManageController::class, 'Manage_User_Show_Add'])->name('user_show_add');
    Route::post('/user/add', [ManageController::class, 'Manage_User_Add'])->name('user_add');
    Route::get('/user/edit/{username}', [ManageController::class, 'Manage_User_Show_Edit'])->name('user_show_edit');
    Route::post('/user/edit/{username}', [ManageController::class, 'Manage_User_Edit'])->name('user_edit');
    Route::post('/user/nonactive/{id}', [ManageController::class, 'Manage_User_NonActive'])->name('user_edit_is_active');
});
