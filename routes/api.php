<?php

use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/emails', [EmailController::class, 'submitEmail']);
Route::get('/emails', [EmailController::class, 'listEmails']);
