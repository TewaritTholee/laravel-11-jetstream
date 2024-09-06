<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EditRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// login เข้าสู่ระบบ
Route::post('/login', [LoginController::class, 'login']);

// ไปยังหน้าเพิ่ม สมาชิก ลูกค้า
Route::get('/register/edit-register', [EditRegisterController::class, 'index'])->name('edit.register');




















// Route::get('/edit-register', [EditRegisterController::class, 'index'])->name('edit.register');
