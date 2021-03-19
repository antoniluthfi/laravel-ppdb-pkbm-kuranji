<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BerkasController;
use App\Http\Controllers\Api\PendaftaranController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('user', [UserController::class, 'index']);
    Route::get('user/my/profile', [UserController::class, 'getCurrentUser']);
    Route::get('user/{id}', [UserController::class, 'getDataById']);
    Route::get('user/role/{role}', [UserController::class, 'getUserByRole']);
    Route::post('user', [UserController::class, 'create']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user', [UserController::class, 'delete']);

    Route::get('berkas', [BerkasController::class, 'index']);
    Route::get('berkas/{id}', [BerkasController::class, 'getDataById']);
    Route::post('berkas', [BerkasController::class, 'create']);
    Route::post('berkas/{id}', [BerkasController::class, 'upload']);
    Route::put('berkas/{id}', [BerkasController::class, 'update']);
    Route::delete('berkas/{id}', [BerkasController::class, 'delete']);

    Route::get('pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('pendaftaran/{id}', [PendaftaranController::class, 'getDataById']);
    Route::get('pendaftaran/user/{id}', [PendaftaranController::class, 'getDataById']);
    Route::get('pendaftaran/group/by/periode', [PendaftaranController::class, 'getPeriode']);
    Route::get('pendaftaran/count/total/program-paket', [PendaftaranController::class, 'getDataByProgramPaket']);
    Route::post('pendaftaran', [PendaftaranController::class, 'create']);
    Route::put('pendaftaran/{id}', [PendaftaranController::class, 'update']);
    Route::delete('pendaftaran', [PendaftaranController::class, 'delete']);
});