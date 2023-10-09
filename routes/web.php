<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntranetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::group(['prefix' => 'intranet'], function () {
    Route::get('/', function () {
        return view('intranet.app');
    });
    Route::get('login', function () {
        return view('intranet.app');
    });
});


Route::get('/', HomeController::class)->name('home');



// Route::get('/intranet', function () {
//     return view('intranet.app');
// });


Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/usuario-session-data',[UserController::class,'mostrarDatoUsuario']);

});

//Route::get('/nosotros', [HomeController::class,'nosotros'])->name('nosotros.quienessomos');

Route::get('/prueba', [HomeController::class,'prueba'])->name('prueba');
Route::get('quienes-somos', [HomeController::class,'quienessomos'])->name('quienessomos');
Route::get('mision-vision', [HomeController::class,'misionvision'])->name('misionvision');
Route::get('ambo-historia', [HomeController::class,'historia'])->name('historia');
Route::get('ambo-turismo', [HomeController::class,'turismo'])->name('turismo');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/routesEntradas.php';