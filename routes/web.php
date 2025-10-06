<?php

use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('paket', PaketController::class);