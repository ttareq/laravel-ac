<?php

use App\Models\Data;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;

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

// Route::controller(LoginController::class)->group(function () {
//     Route::get('/login', 'login');
//     Route::post('/register', 'register');
// });

Route::get('pegawai/cetak', [CetakController::class, 'cetak_pdf']); // Resource dibawah untuk menghindari Not Found

Route::resource('pegawai', PegawaiController::class); 


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
