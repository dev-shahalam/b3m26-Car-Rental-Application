<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerConroller;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserTokenVerify;
use Illuminate\Support\Facades\Route;


// Admin & Customer Routes for Web


Route::get('/admin-dashboard',[AdminController::class,'dashboard'])
    ->name('admin-dashboard')
    ->middleware(UserTokenVerify::class);
Route::get('admin-register',[AdminController::class,'register'])->name('admin-register');
Route::get('admin-login',[AdminController::class,'login'])->name('admin-login');
Route::get('logout',[AdminController::class,'logoutAdmin'])->name('logout')
    ->middleware(UserTokenVerify::class);
Route::get('send-otp',[AdminController::class,'sendOtp'])->name('send-otp');
Route::get('submit-otp',[AdminController::class,'verifyOtp'])->name('submit-otp');
Route::get('reset-password',[AdminController::class,'resetPassword'])->name('reset-password');

// Admin Routes for API
Route::post('admin-register',[AdminController::class,'createAdmin'])->name('admin-registe');
Route::post('admin-login',[AdminController::class,'loginAdmin'])->name('login')->name('admin-login');
Route::post('send-otp',[AdminController::class,'sendOtpAdmin'])->name('send-otp');
Route::post('submit-otp',[AdminController::class,'verifyOtpAdmin'])->name('submit-otp');
Route::post('reset-password',[AdminController::class,'resetPasswordAdmin'])->name('reset-password');






// Customer page
Route::get('customer-page',[AdminController::class,'customerPage'])
    ->name('customer-page')
    ->middleware(UserTokenVerify::class);


Route::get('cus-registration',[CustomerConroller::class,'registration'])
    ->name('cus-registration');
Route::post('cus_register',[CustomerConroller::class,'createCustomer'])
->name('cus_register');




Route::get('rental-page',[AdminController::class,'rentalPage'])
    ->name('rental-page')
    ->middleware(UserTokenVerify::class);





// Car Routes
Route::get('car-page',[CarController::class,'carPage'])
    ->name('car-page')
    ->middleware(UserTokenVerify::class);


Route::get('car-create',[CarController::class,'createCarPage'])
->name('car-create');

Route::post('car-create',[CarController::class,'createCar'])->name('create-car');

Route::get('car-view/{id}',[CarController::class,'viewCarById'])
    ->name('car-view')
    ->middleware(UserTokenVerify::class);


Route::get('car-delete/{id}',[CarController::class,'deleteCar'])
    ->name('car-delete')
    ->middleware(UserTokenVerify::class);


Route::put('car-update/{id}',[CarController::class,'updateCar'])
    ->name('car-update')
    ->middleware(UserTokenVerify::class);



// Car Rental Routes
Route::post('create-rental',[RentalController::class,'createRental']);




//User Controller
Route::get('/', [UserController::class, 'HomePage']);
Route::get('/profile', [UserController::class, 'ProfilePage']);
Route::get('cars', [UserController::class, 'CarsPage']);
Route::get('service', [UserController::class, 'ServicePage']);
Route::get('about', [UserController::class, 'AboutPage']);
Route::get('contact', [UserController::class, 'ContactPage']);


// user auth
Route::get('cus-login', [UserController::class, 'LoginPage'])
->name('cus-login');

Route::post('cus-login', [UserController::class, 'loginCustomer'])
->name('cus-login');

Route::get('cus-registration', [UserController::class, 'RegisterPage'])
->name('cus-registration');
Route::post('cus-registration', [UserController::class, 'createCustomer'])
->name('cus-registration');


Route::get('cus-logout', [UserController::class, 'Logout'])
->name('cus-logout');

Route::get('cus-profile', [UserController::class, 'ProfilePage'])
->name('cus-profile');




//Rental Controller
Route::get('booking',[BookingController::class,'BookingPage'])->name('booking');
Route::post('booking',[BookingController::class,'Booking']);
