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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('/logout',[LoginController::class,'logout']);
    Route::get('/intranet/usuario-session-data',[UserController::class,'mostrarDatoUsuario']);
    Route::post('/actualizar-perfil',[UserController::class,'actualizarperfil']);
    Route::post('/cambiar-clave',[UserController::class,'cambiarclaveperfil']);
});
Route::get('/intranet/principal', [IntranetController::class, 'index'])->name('intranet');
Route::get('/intranet/{path}',[IntranetController::class,'index'])->where('path','.*');
Route::post('/intranet/login',[LoginController::class,'validarLogin'])->name('login');

Route::get('/prueba', [HomeController::class,'prueba'])->name('prueba');
Route::get('quienes-somos', [HomeController::class,'quienessomos'])->name('quienessomos');
Route::get('mision-vision', [HomeController::class,'misionvision'])->name('misionvision');
Route::get('contactenos', [HomeController::class,'contactenos'])->name('contactenos');
Route::get('ambo-historia', [HomeController::class,'historia'])->name('historia');
Route::get('ambo-turismo', [HomeController::class,'turismo'])->name('turismo');
Route::get('ambo-turismo', [HomeController::class,'turismo'])->name('turismo');
Route::get('gerencia-municipal', [HomeController::class, 'gerenciaMunicipal'])->name('gerencia.municipal');
Route::get('directorio-institucional', [HomeController::class, 'directorio'])->name('directorio.institucional');

Route::get('gerencia-atencion-ciudadano', [HomeController::class, 'gerenciaOficinaAtencion'])->name('atencion-ciudadano');
Route::get('gerencia-oficina-administracion', [HomeController::class, 'gerenciaOficinaAdministracion'])->name('oficina-administracion');
Route::get('gerencia-oficina-planeamiento', [HomeController::class, 'gerenciaOficinaPlaneamientoPresupuesto'])->name('oficina-planeamiento-presupuesto');
Route::get('gerencia-territorial-infraestructura', [HomeController::class, 'gerenciaTerritorialInfraestructura'])->name('territorial-infraestructura');
Route::get('gerencia-asesoria-legal', [HomeController::class, 'gerenciaAsesoriaLegal'])->name('asesoria-legal');
Route::get('gestion-ambiental', [HomeController::class, 'gestionAmbiental'])->name('gestion.ambiental');
Route::get('desarrollo-social', [HomeController::class, 'desarrolloSocial'])->name('desarrollo.social');
Route::get('desarrollo-economico', [HomeController::class, 'desarrolloEconomico'])->name('desarrollo.economico');
Route::get('informacion-demografica', [HomeController::class,'informacionDemografica'])->name('informaciondemografica');
Route::get('municipalidad-alcalde', [HomeController::class,'municipalidadAlcalde'])->name('municipalidad.alcalde');
Route::get('municipalidad-consejomunicipal', [HomeController::class,'concejoMunicipal'])->name('municipalidad.concejomunicipal');
Route::get('municipalidad-funcionarios', [HomeController::class,'functionariosMunicipales'])->name('municipalidad.funcionarios');

//subgerencias
Route::get('obras-publicas', [HomeController::class,'obrasPublicas'])->name('municipalidad.obraspublicas');
Route::get('estudios-proyectos', [HomeController::class,'estudiosProyectos'])->name('municipalidad.estudios.proyectos');
Route::get('acondicionamiento-territorial', [HomeController::class,'acondicionamientoTerritorial'])->name('municipalidad.acondicionamiento');
Route::get('riesgo-desastre', [HomeController::class,'riesgoDesastre'])->name('municipalidad.riesgo.desastre');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/routesEntradas.php';
require __DIR__.'/intranet.php';