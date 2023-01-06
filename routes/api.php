<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'middleware' => 'api',
    ],
    function ($router) {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('prodi', ProgramStudiController::class);
        Route::delete('mahasiswa/{mahasiswa:nim}', [
            MahasiswaController::class,
            'destroyByNIM',
        ]);
    }
);
