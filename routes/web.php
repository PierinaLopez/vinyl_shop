<?php

use App\Livewire\Demo;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return ('The Vinyl Shop');
});

//Route::get('contact', function () {
//    return view('contact');
//});

Route::view('/', 'home')->name('home');
Route::view('contact', 'contact')->name('contact');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::get('records', Demo::class)->name('records');

    Route::view('download_covers', 'admin.download_covers')->name('download_covers');
});

Route::view('playground', 'playground')->name('playground');
Route::view('under-construction', 'under-construction')->name('under-construction');


