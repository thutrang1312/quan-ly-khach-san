<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\Controller; 
use App\Http\Resources\views\admin\adminHome; 
use App\Http\Resources\views\admin\adminSideBar; 


Route::get('/', [RegisterController::class, 'index'])->name('pages.index');
// Route cho trang đăng ký
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');

Route::post('/register', [RegisterController::class, 'submitRegister'])->name('register.submit');

// Route cho trang đăng nhập
Route::get('/login', [LoginController::class, 'showLogin'])->name('auth.login'); 

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('pages.home');

Route::post('/contact', [HomeController::class, 'contact']);

//Route cho trang adminHome
Route::get('/adminHome', [AdminController::class, 'index'])->name('admin.adminHome');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
//add room
Route::get('/create_room', [AdminController::class, 'create_room'])->name('admin.create_room');

Route::post('/add_room', [AdminController::class, 'add_room']);

//view room
Route::get('/view_room', [AdminController::class, 'view_room'])->name('admin.view_room');

Route::post('/add_room', [AdminController::class, 'add_room']);

Route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);

Route::get('/update_room/{id}', [AdminController::class, 'update_room']);

Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

Route::get('/edit_room/{id}', [AdminController::class, 'edit_room']);

Route::get('/room_details/{id}', [HomeController::class, 'room_details']);

Route::post('/add_booking/{id}', [HomeController::class, 'add_booking'])->name('add_booking');


Route::get('/booking', [AdminController::class, 'booking'])->name('admin.booking');

Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('admin.booking');

Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

Route::get('/rejected_book/{id}', [AdminController::class, 'rejected_book']);

Route::get('/view_gallary', [AdminController::class, 'view_gallary']);

Route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);

Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);

Route::get('/all_messages', [AdminController::class, 'all_messages']);

Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);

Route::delete('/mail/{id}', [AdminController::class, 'delete_message'])->name('delete_message');

Route::post('/submit_rating/{id}', [HomeController::class, 'submitRating'])->name('submitRating');


Route::delete('/delete_rating/{id}', [HomeController::class, 'deleteRating'])->name('delete_rating');

// routes/web.php
Route::get('/history', [BookingController::class, 'showHistory'])->name('history');

// Route::get('/monthly-revenue', [AdminController::class, 'getMonthly']);

Route::get('/annual-revenue', [AdminController::class, 'getAnnualRevenue']);
Route::get('/monthly-revenue', [AdminController::class, 'getMonthlyRevenue']);


// web.php





