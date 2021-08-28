<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
///home section
Route::get('/',[HomeController::class,"index"]);
Route::get("/redirect",[HomeController::class,'redirect']);


///Admin section
Route::get("/adminpannel",[AdminController::class,"index"])->name("admin.pannel");
Route::get("/adminuserlists",[AdminController::class,"userLists"])->name("admin.userlists");
Route::delete('/adminuserdelete/{id}',[AdminController::class,"userDelete"])->name("admin.userdelete");
Route::get("/foodadd",[AdminController::class,"foodAdd"])->name("admin.foodadd");
Route::post("foodadd",[AdminController::class,'foodStore'])->name("admin.foodadd");
Route::get("/foodlists",[AdminController::class,"foodLists"])->name("admin.foodlists");
Route::delete("/fooddelete/{id}",[AdminController::class,'foodDelete'])->name('admin.fooddelete');
Route::get("/foodedit/{id}",[AdminController::class,'foodEdit'])->name("admin.foodedit");
Route::post("/foodedit/{id}",[AdminController::class,'foodUpdate'])->name("admin.foodedit");
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
