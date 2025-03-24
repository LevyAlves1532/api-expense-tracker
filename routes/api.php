<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'registerUser']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function() {
        Route::get('me', [AuthController::class, 'me']);
    });
});

Route::middleware('auth:api')->group(function() {
    Route::prefix('income')->group(function() {
        Route::get('/', [IncomeController::class, 'index']);

        Route::post('/', [IncomeController::class, 'store']);
        Route::delete('/{id}', [IncomeController::class, 'delete']);
    });

    Route::prefix('expense')->group(function() {
        Route::get('/', [ExpenseController::class, 'index']);

        Route::post('/', [ExpenseController::class, 'store']);
        Route::delete('/{id}', [ExpenseController::class, 'delete']);
    });
});

Route::get('/income/{user_id}/download', [IncomeController::class, 'downloadIncomeExcel']);
Route::get('/expense/{user_id}/download', [ExpenseController::class, 'downloadExpenseExcel']);
