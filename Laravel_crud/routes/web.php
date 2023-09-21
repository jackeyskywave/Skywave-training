<?php

// use App\Http\Controllers\demoController;
// use App\Http\Controllers\singleActionController;
// use App\Http\Controllers\resourceController;


// use App\Http\Controllers\registrationController;
use Illuminate\Support\Facades\Route;
// use App\Models\Customer;
use App\Http\Controllers\customerController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/{name?}', function ($name = null) {
//     $demo = "<h2>Prachi</h2>";
//     $data = compact('name','demo');
//     return view('home')->with($data);
// });

// Route::get('/basicController',[demoController::class,'index']);
// Route::get('/singleActionController',singleActionController::class);
// Route::resource('photo',resourceController::class);

// Route::get('/register', [registrationController::class, 'index']);
// Route::post('/register', [registrationController::class, 'register']);
// Route::get('/customer', function () {
//     $customers = Customer::all();
//     echo "<pre>";
//     print_r($customers->toArray());
// });
Route::get('/',function(){
return view('index');
});

Route::get('/customer',[customerController::class,'create']);
Route::get('/customer/view',[customerController::class,'view']);
Route::post('/customer',[customerController::class,'store']); 
Route::get('/customer/delete/{id}',[customerController::class,'delete'])->name('customer.delete');
Route::get('/customer/edit/{id}',[customerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[customerController::class,'update'])->name('customer.update');