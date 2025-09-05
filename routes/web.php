<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// rutas orm 
Route::get('/orm/users', [OrmController::class, 'usersRelations']);
Route::get('/orm/coments', [OrmController::class, 'comentsRelations']);
Route::get('/orm/publications', [OrmController::class, 'publicationsRelations']);
Route::get('/orm/sellers', [OrmController::class, 'sellersRelations']);
Route::get('/orm/complaints', [OrmController::class, 'complaintsRelations']);
Route::get('/orm/chatsupport', [OrmController::class, 'chatSupportUsers']);
Route::get('/orm/images', [OrmController::class, 'imagesRelations']);

// rutas del crud 


//Route::resource('users', UserController::class);  // con esta se llaman todos 

 Route::get('/users', [UserController::class, 'index']);
// // Crear formulario
 Route::get('/users/create', [UserController::class, 'create']);
// // Guardar nuevo usuario
 Route::post('/users', [UserController::class, 'store']);
// // Mostrar usuario específico (JSON)
 Route::get('/users/{user}', [UserController::class, 'show']);
// // Editar formulario
 Route::get('/users/{user}/edit', [UserController::class, 'edit']);
// // Actualizar usuario
 Route::put('/users/{user}', [UserController::class, 'update']);
 // Eliminar usuario (JSON)
 Route::delete('/users/{user}/borrar', [UserController::class, 'destroy']);

