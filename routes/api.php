<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FeatureController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\SubscriptionController;
use App\Http\Controllers\API\PostAttachmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('/user/register', UserController::class);

    Route::get('/roles', [UserController::class, 'getRoleName']);
    Route::apiResource('/category', CategoryController::class);
});

Route::post('auth/login', [AuthController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'dashboardList']);
