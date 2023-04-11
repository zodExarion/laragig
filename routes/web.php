<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;



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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// All Listings
Route::controller(ListingController::class)->group(function () {

    Route::get('/', 'index');

    // Show Create Form
    Route::get('/listings/create', 'create')->middleware('auth');

    // Store Listing Data
    Route::post('/listings', 'store')->middleware('auth');

    // Show Edit Form
    Route::get('/listings/{listing}/edit', 'edit')->middleware('auth');

    // Update Listing
    Route::put('/listings/{listing}', 'update')->middleware('auth');

    // Delete Listing
    Route::delete('/listings/{listing}', 'destroy')->middleware('auth');

    // Manage Listings
    Route::get('/listings/manage', 'manage')->middleware('auth');

    // Single Listing
    Route::get('/listings/{listing}', 'show');
});

Route::controller(UserController::class)->group(function () {

    // Show Register/Create Form
    Route::get('/register', 'create')->middleware('guest');

    // Create New User
    Route::post('/users', 'store');

    // Log User Out
    Route::post('/logout', 'logout')->middleware('auth');

    // Show Login Form
    Route::get('/login', 'login')->name('login')->middleware('guest');

    // Log In User
    Route::post('/users/authenticate', 'authenticate');
});
