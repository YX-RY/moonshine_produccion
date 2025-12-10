<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Si Moonshine no está instalado, redirige a login normal
Route::get('/admin', function () {
    // Verifica si Moonshine existe
    if (class_exists('MoonShine\Moonshine')) {
        return redirect('/moonshine');
    } else {
        return redirect('/login'); // O muestra un mensaje
    }
});
