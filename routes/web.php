<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListKpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\{
    PermissionController,
    AcademicYearController,
    MajorController,
    KelasController,
};

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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('index');
})->name('index');

//Dashboard Route
Route::get('/home',                 [HomeController::class, 'index'])->name('home');

//Lists-kp Route
Route::get('/lists-kp/export',      [ListKpController::class, 'export'])->name('lists-kp.export');
Route::post('/lists-kp/import',     [ListKpController::class, 'import'])->name('lists-kp.import');
Route::resource('lists-kp',         ListKpController::class);

// Users Route
Route::resource('users',            UserController::class);
// Roles Route
Route::resource('roles',            RoleController::class);
// Permissions Route
Route::resource('permissions',      PermissionController::class);
// Academic Years Route
Route::resource('academic-years',   AcademicYearController::class);
// Majors Route
Route::resource('majors',           MajorController::class);
// Kelas Route
Route::resource('kelas',            KelasController::class);