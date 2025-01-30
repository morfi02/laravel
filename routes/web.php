<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\LibroController;

//libros
Route::get('/libros/crear', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/{id}/editar', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');
Route::delete('/admin/usuarios/{user}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');
});

//libros


//formulario
Route::get('/procesar-datos', function () {
    return view('formulario');
});
Route::post('/procesar-datos', [DatosController::class, 'procesar']);
([App\Http\Controllers\DatosController::class, 'procesar']);
//fin de formulario

//ejercicio1
Route::get('/', function () {
    return 'welcome';
});


//ejercicio2
Route::get('/usuario/{id}', function ($id) {
    return 'el id de Usuario: ' . $id;
    });


// ejercicio3
Route::get('/contacto', function () {
    Echo ("Página de contacto");
    return route('contacto');
})->name('contacto');


// ejercicio 4
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/usuarios', function () {
        return view('usuarios');
    });

    Route::get('/configuracion', function () {
        return "Configuración del sistema";
    });
});


