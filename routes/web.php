<?php

use Illuminate\Support\Facades\Route;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Redirige /admin a /moonshine (para tu botón)
Route::get('/admin', function () {
    return redirect('/moonshine');
});