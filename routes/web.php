<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CetakLaporanController;
use App\Http\Controllers\CetakLaporanExcelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan/excel/data-user/siswa', [CetakLaporanExcelController::class, 'exportUser']);
Route::get('/laporan/excel/data-user/administrator', [CetakLaporanExcelController::class, 'exportAdministrator']);
Route::get('/laporan/excel/pendaftaran/{kategori}/{periode}', [CetakLaporanExcelController::class, 'exportListPendaftaran']);
Route::get('/laporan/{tipeLaporan}/{id}', [CetakLaporanController::class, 'cetakLaporan']);