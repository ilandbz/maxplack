<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntranetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticiaController;
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

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('/logout',[LoginController::class,'logout']);
    Route::get('/intranet/usuario-session-data',[UserController::class,'mostrarDatoUsuario']);

});
Route::get('/intranet',[IntranetController::class,'index']);

Route::get('/intranet/{path}',[IntranetController::class,'index'])->where('path','.*');

Route::get('/', HomeController::class)->name('home');

Route::post('/intranet/login',[LoginController::class,'validarLogin']);

// Route::get('/intranet', function () {
//     return view('intranet.app');
// });




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
Route::group(['prefix' => 'noticia', 'middleware' => ['auth:sanctum']], function () {
    Route::get('mostrar', [NoticiaController::class, 'show']);
    Route::post('actualizar', [NoticiaController::class, 'update']);
    Route::post('eliminar', [NoticiaController::class, 'destroy']);
    Route::post('guardar', [NoticiaController::class, 'store']);
    Route::get('listar', [NoticiaController::class, 'listar']);
    Route::post('subir-imagen', [NoticiaController::class, 'subirImagen']);
});
require __DIR__.'/auth.php';
require __DIR__.'/routesEntradas.php';