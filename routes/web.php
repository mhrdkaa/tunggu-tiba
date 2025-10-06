<?php

use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/paket');
});

Route::resource('paket', PaketController::class);