<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('chatsupport', ChatSupportController::class);
Route::apiResource('coments', ComentController::class);
Route::apiResource('complaints', ComplaintController::class);
Route::apiResource('images', ImageController::class);
Route::apiResource('publications', PublicationController::class);
Route::apiResource('publicationusers', PublicationUserController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('sellers', SellerController::class);
Route::apiResource('users', UserController::class);

