<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Livewire\CustomerRegister;
use App\Livewire\CustomerLogin;
use App\Livewire\PropertyType;
use App\Livewire\Property;
use App\Livewire\Home;
use App\Livewire\User;
use App\Livewire\CustomerView;
use App\Livewire\PropertyBooking;
use App\Livewire\BookYourProperty;
use App\Livewire\Bookings;
use App\Livewire\CustomerReview;
use App\Livewire\Reviews;
use App\Livewire\ContactUs;
use App\Livewire\ContactUsView;
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



Route::get('/admin', function () {
    return view('auth.Login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/customer-login', [LoginController::class, 'customerLogin']);
Route::get('/customer-logout', [LoginController::class, 'customerLogout'])->name('customer-logout');
Route::post('/customerRegister', [CustomerController::class, 'customerRegister'])->name('customerRegister');
Route::post('/bookYourProperty', [CustomerController::class, 'bookYourProperty'])->name('bookYourProperty');
Route::post('/CustomerReview', [CustomerController::class, 'CustomerReview'])->name('CustomerReview');
Route::post('/ContactUs', [CustomerController::class, 'ContactUs'])->name('ContactUs');


Route::get('/', Home::class)->name('home');
Route::get('/customer-register', CustomerRegister::class)->name('customer-register');
Route::get('/flogin', CustomerLogin::class)->name('flogin');
Route::get('/property-booking', PropertyBooking::class)->name('property-booking');
Route::get('/bookyourproperty/{id}', BookYourProperty::class)->name('bookyourproperty');
Route::get('/customer-review', CustomerReview::class)->name('customer-review');
Route::get('/contact-us', ContactUs::class)->name('contact-us');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/property-type', PropertyType::class)->name('property-type');
    Route::get('/property', Property::class)->name('property');
    Route::get('/users', User::class)->name('users');
    Route::get('/customer-view', CustomerView::class)->name('customer-view');
    Route::get('/bookings', Bookings::class)->name('bookings');
    Route::get('/reviews', Reviews::class)->name('reviews');
    Route::get('/contact-us-view', ContactUsView::class)->name('contact-us-view');
});
