<?php
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CottageController;
use App\Http\Controllers\PaymentController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    Route::apiResource('cottages', CottageController::class);
    Route::apiResource('rooms', RoomController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::apiResource('service-requests', ServiceRequestController::class);
    Route::apiResource('payments', PaymentController::class);
});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin/transactions', [AdminController::class, 'transactions']);
});

Route::get('/admin/transactions', [AdminController::class, 'transactions'])
    ->middleware(['auth:sanctum', 'role:admin']);

Route::get('/staff/tasks', [ServiceRequestController::class, 'staffTasks'])
    ->middleware(['auth:sanctum', 'role:staff']);

Route::get('/my-reservations', [ReservationController::class, 'myReservations'])
    ->middleware('auth:sanctum');

Route::post('/staff/tasks/{id}/complete', [ServiceRequestController::class, 'markComplete'])
    ->middleware(['auth:sanctum', 'role:staff']);
