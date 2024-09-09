<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EditRegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return redirect()->route('login');
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
Route::get('registers/getDataRegisters', [EditRegisterController::class, 'getDataRegisters'])->name('registers.getDataRegisters');
Route::resource('registers', EditRegisterController::class);















// Route::get('registers', [EditRegisterController::class, 'index'])->name('registers.index');
// Route::get('registers/getData', [EditRegisterController::class, 'getDataRegisters'])->name('registers.getData');
// Route::post('registers', [EditRegisterController::class, 'store'])->name('registers.store');
// Route::get('registers/{id}', [EditRegisterController::class, 'show'])->name('registers.show');
// Route::get('registers/{id}/edit', [EditRegisterController::class, 'edit'])->name('registers.edit');
// Route::delete('registers/{id}', [EditRegisterController::class, 'destroy'])->name('registers.destroy');

// Route::get('/register/edit-register', [EditRegisterController::class, 'index'])->name('edit.register');


// Route::resource('dataRegisters', EditRegisterController::class);



// Route::middleware([
    //     'auth:sanctum',
    //     config('jetstream.auth_session'),
    //     'verified',
    //     'check.status', // เพิ่ม middleware ที่ตรวจสอบสถานะ
    // ])->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('dashboard');
    //     })->name('dashboard');
    // });













// Route::resource('/register/edit-register', EditRegisterController::class);
// Route::get('/edit-register', [EditRegisterController::class, 'index'])->name('edit.register');
