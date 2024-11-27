<?php

use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('emails')->group(function () {
    Route::post('/', [EmailController::class, 'submitEmail']);
    Route::get('/', [EmailController::class, 'listEmails']);
    Route::get('/sent', [EmailController::class, 'listSentEmails']);
});
