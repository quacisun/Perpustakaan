<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return redirect()->route('buku.index');
});

Route::get('/coba', function () {
    return view('coba');
});

Route::resource('buku', BukuController::class);