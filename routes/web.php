<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::controller(DemoController::class)->group(function (){
    Route::get('/', 'HomeMain')->name('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

});


  // Admin All Route 
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add'); 
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit'); 
    Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');

});

// Customer All Route 
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'CustomerAll')->name('customer.all'); 
    Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
    Route::post('/customer/store', 'CustomerStore')->name('customer.store');
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');

});



// Machine Routes
Route::controller(MachineController::class)->group(function () {
    Route::get('/machine/all', 'index')->name('machine.all'); 
    Route::get('/machine/add', 'create')->name('machine.add');
    Route::post('/machine/store', 'store')->name('machine.store');
    Route::get('/machine/edit/{id}', 'edit')->name('machine.edit');
    Route::put('/machine/update/{id}', 'update')->name('machine.update'); // Change to PUT
    Route::get('/machine/delete/{id}', 'destroy')->name('machine.delete');
});

// Engineer Routes
Route::prefix('engineers')->group(function () {
    Route::get('/', [EngineerController::class, 'index'])->name('engineers.all'); // Display all engineers
    Route::get('/add', [EngineerController::class, 'create'])->name('engineers.add'); // Show add engineer form
    Route::post('/store', [EngineerController::class, 'store'])->name('engineers.store'); // Store new engineer
    Route::get('/edit/{id}', [EngineerController::class, 'edit'])->name('engineers.edit'); // Show edit engineer form
    Route::put('/update/{id}', [EngineerController::class, 'update'])->name('engineers.update'); // Update engineer details
    Route::delete('/delete/{id}', [EngineerController::class, 'destroy'])->name('engineers.delete'); // Delete engineer
});

Route::get('/reports', [ReportController::class, 'index'])->name('reports.all');
Route::get('/reports/add', [ReportController::class, 'create'])->name('reports.add');
Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/edit/{id}', [ReportController::class, 'edit'])->name('reports.edit');
Route::put('/reports/update/{id}', [ReportController::class, 'update'])->name('reports.update');
Route::delete('/reports/delete/{id}', [ReportController::class, 'destroy'])->name('reports.delete');




Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category'); 
    Route::get('/get-product', 'GetProduct')->name('get-product');


});
require __DIR__.'/auth.php';
