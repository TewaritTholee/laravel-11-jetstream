<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EditRegisterController;

// ทดสอบการใช้งาน user
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DataAssetController;


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

// ตัวทดสอบ การทำ CRUD
Route::resource('users', UserController::class);


// ข้อมูลลูกค้า Data Aseets
Route::get('/data_asset', [DataAssetController::class, 'index']);
Route::get('data_assets', [DataAssetController::class, 'index'])->name('data_assets.index');
Route::get('/fetch-data-assets', [DataAssetController::class, 'fetchData']);
Route::post('/data-assets/update/{id}', [DataAssetController::class, 'update']);
Route::post('/data-assets/create', [DataAssetController::class, 'create']);
Route::delete('/data-assets/delete/{id}', [DataAssetController::class, 'destroy'])->name('data-assets.destroy');

// แสดง
// Route::get('/assets/{id}', [DataAssetController::class, 'show'])->name('assets.show');

// Route::get('/data-assets/show/{id}', [DataAssetController::class, 'show']);

// Route::get('data-assets/{id}', [DataAssetController::class, 'show']);

// Route::get('/data-assets/{id}', [DataAssetController::class, 'show']);
























// routes/web.php
// Route::get('/data-assets/{id}', [DataAssetController::class, 'show'])->name('data-assets.show');

// Route::delete('/data-assets/delete/{id}', [DataAssetController::class, 'destroy']);
// Route::get('/data-assets/{id}', [DataAssetController::class, 'show'])->name('data-assets.show');











Route::get('/customers', function () {
    return view('customers.index');
});

Route::get('/customers', [CustomerController::class, 'index']);

// Template Design
// Route::resource('Data_Asset', DataAssetController::class);
// Route::get('/Data_Asset', [DataAssetController::class, 'index']);

// DataAsset Masiron
Route::resource('data-assets', DataAssetController::class);













// Route::resource('data-assets', DataAssetController::class);
// routes/web.php

Route::resource('data-assets', DataAssetController::class);

//
// Route::get('/data-assets', [DataAssetController::class, 'index']);
// Route::post('/data-assets', [DataAssetController::class, 'store']);
// Route::put('/data-assets/{id}', [DataAssetController::class, 'update']);
// Route::delete('/data-assets/{id}', [DataAssetController::class, 'destroy']);
////////////////////////////////////////////////////////////////////////////////////



















// Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
// Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');





// Route::get('/', function () {
//     return view('welcome');
// });

// ตัวทดสอบ การทำ CRUD
// Route::resource('users', UserController::class);
// Route::get('users/index', [UserController::class, 'index'])->name('users.index');

// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('users', [UserController::class, 'index'])->name('users.index');



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
