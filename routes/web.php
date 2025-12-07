<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

route::get('/', [AdminController::class, 'home']);
route::get('/home', [AdminController::class, 'index'])->name('home');


//Admin Routes
route::get('/create_room', [AdminController::class, 'create_room'])->middleware(['auth', 'admin']);

route::post('/add_room', [AdminController::class, 'add_room'])->middleware(['auth', 'admin']);

route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room')->middleware(['auth', 'admin']);

route::get('/edit_room/{id}', [AdminController::class, 'edit_room'])->middleware(['auth', 'admin']);

route::post('/update_room/{id}', [AdminController::class, 'update_room'])->middleware(['auth', 'admin']);

route::get('/delete_room/{id}', [AdminController::class, 'delete_room'])->middleware(['auth', 'admin']);

route::get('/view_booking', [AdminController::class, 'view_booking'])->middleware(['auth', 'admin']);

route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->middleware(['auth', 'admin']);

route::post('/update_booking_status/{id}', [AdminController::class, 'update_booking_status'])->middleware(['auth', 'admin']);

route::get('/view_gallery', [AdminController::class, 'view_gallery'])->middleware(['auth', 'admin']);

route::post('/upload_gallery', [AdminController::class, 'upload_gallery'])->middleware(['auth', 'admin']);

route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery'])->middleware(['auth', 'admin']);

route::get('/view_message', [AdminController::class, 'view_message'])->middleware(['auth', 'admin']);

route::get('/send_email/{id}', [AdminController::class, 'send_email'])->middleware(['auth', 'admin']);

route::post('/mail/{id}', [AdminController::class, 'mail'])->middleware(['auth', 'admin']);


//User Routes
route::get('/our_rooms', [HomeController::class, 'our_rooms']);

route::get('/hotel_gallery', [HomeController::class, 'hotel_gallery']);

route::get('/about_us', [HomeController::class, 'about_us']);

route::get('/contactus', [HomeController::class, 'contactus']);

route::get('/room_details/{id}', [HomeController::class, 'room_details']);

route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

route::post('/contact', [HomeController::class, 'contact_us']);
