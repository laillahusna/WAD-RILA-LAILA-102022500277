<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e){
        return "DB gagal connect: " . $e->getMessage();
    }
})->withoutMiddleware('web');

Route::get('/cek-driver', fn() => [PDO::getAvailableDrivers(), php_ini_loaded_file(), config('database.default')]);

Route::redirect('/', '/kamar');
Route::resource('kamar', KamarController::class);