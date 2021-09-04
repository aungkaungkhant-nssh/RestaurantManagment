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
Route::get('/',[HomeController::class,"redirect"])->name("home");
Route::post("/addcarts/{id}",[HomeController::class,'addCarts'])->name("home.addcarts");
Route::get("/showcarts",[HomeController::class,"showCarts"])->middleware("userAndAuthCheck")->name('home.showcarts');
Route::get("/removecarts/{id}",[HomeController::class,'removeCarts'])->name('home.removecarts');
Route::get("increasecarts/{id}",[HomeController::class,'increaseCarts'])->name("home.increasecarts");
Route::get("decreasecarts/{id}",[HomeController::class,'decreaseCarts'])->name("home.decreasecarts");


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
Route::get("/chefsadd",[AdminController::class,'chefsAdd'])->name("admin.chefsadd");
Route::post("/chefsadd",[AdminController::class,'chefsStore'])->name("admin.chefsadd");
Route::get("/cheflists",[AdminController::class,"chefLists"])->name("admin.cheflists");
Route::get("/chefedit/{id}",[AdminController::class,"chefEdit"])->name("admin.chefedit");
Route::delete("/chefdelete/{id}",[AdminController::class,"chefDelete"])->name("admin.chefdelete");
Route::post("/chefedit/{id}",[AdminController::class,"chefUpdate"])->name("admin.chefedit");
Route::post("/reservations",[AdminController::class,"reservations"])->name("admin.reservations");
Route::get("reservationlists",[AdminController::class,"reservationLists"])->name("admin.reservationlists");
Route::post("ordernow",[AdminController::class,'orderNow'])->name("home.ordernow");
Route::get("orderlists",[AdminController::class,'orderLists'])->name("admin.orderlists");
Route::get("/admindashboard",[AdminController::class,'adminDashboard'])->name("admin.dashboard");
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
