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
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'Profile'])->name('profile');
Route::get('/prediksi-kelulusan', [PrediksiKelulusan::class, 'PrediksiKelulusanView'])->name('prediksi_kelulusan');

Route::name('manage.')->prefix('/manage')->group(function () {
    Route::get('/user/list', [ManageController::class, 'Manage_User_List'])->name('user_list');
});