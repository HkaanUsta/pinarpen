<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\portfoliosController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;
use App\Http\Middleware\is_admin;

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

Route::get("/",[homeController::class,"index"]);

Route::get("/about",[homeController::class,"about"]);

Route::get("/contact",[homeController::class,"contact"]);

Route::get("/portfolios",[homeController::class,"portfolios"]);
Route::get("/portfolios/{slug}/{id}",[HomeController::class,"portfolios_detail"]);

Route::get("/services",[homeController::class,"services"]);



Route::get("/admin", function () {
    if(Auth::user()){
        return redirect('admin/dashboard');
    }else{
        return redirect('admin/login');
    }
    
});

Route::get("/admin/login",[adminController::class,"login"]);
Route::post("/admin/login",[adminController::class,"login_post"]);

Route::prefix('admin')->middleware(["is_admin"])->group(function () {





    Route::get('/dashboard', [adminController::class,"dashboard"]);

    Route::post("/logout",[adminController::class,"logout"]);

    Route::prefix('services')->group(function () {
        Route::get('/', [servicesController::class, 'index']);
        Route::get('/create', [servicesController::class, 'create']);
        Route::post("/",[servicesController::class, "store"]);
        Route::get("/{id}/edit",[servicesController::class, "edit"]);
        Route::put("/{id}",[servicesController::class, "update"]);
        Route::delete("/",[servicesController::class, "delete"]);    
    });

    Route::prefix('portfolios')->group(function () {
        Route::get('/', [portfoliosController::class, 'index']);
        Route::get('/create', [portfoliosController::class, 'create']);
        Route::post("/",[portfoliosController::class, "store"]);
        Route::get("/{id}/edit",[portfoliosController::class, "edit"]);
        Route::put("/{id}",[portfoliosController::class, "update"]);
        Route::delete("/",[portfoliosController::class, "delete"]);    
    });

});


