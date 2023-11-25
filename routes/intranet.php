<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuRoleController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\OrganizacionController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\RedesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeccionesPrincipalController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TipoConvocatoriaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'menu', 'middleware' => 'auth'], function () {
    Route::get('todos', [MenuController::class, 'todos']);
    Route::get('mostrar', [MenuController::class, 'show']);
    Route::post('actualizar', [MenuController::class, 'update']);
    Route::post('eliminar', [MenuController::class, 'destroy']);
    Route::post('guardar', [MenuController::class, 'store']);
    Route::get('listar', [MenuController::class, 'listar']);
});
Route::group(['prefix' => 'archivo', 'middleware' => 'auth'], function () {
    Route::get('todos', [ArchivoController::class, 'todos']);
    Route::get('mostrar', [ArchivoController::class, 'show']);
    Route::post('actualizar', [ArchivoController::class, 'update']);
    Route::post('eliminar', [ArchivoController::class, 'destroy']);
    Route::post('guardar', [ArchivoController::class, 'store']);
    Route::get('listar', [ArchivoController::class, 'listar']);
});
Route::group(['prefix' => 'area', 'middleware' => 'auth'], function () {
    Route::get('todos', [AreaController::class, 'todos']);
    Route::get('mostrar', [AreaController::class, 'show']);
    Route::post('actualizar', [AreaController::class, 'update']);
    Route::post('eliminar', [AreaController::class, 'destroy']);
    Route::post('guardar', [AreaController::class, 'store']);
    Route::get('listar', [AreaController::class, 'listar']);
});
Route::group(['prefix' => 'cargo', 'middleware' => 'auth'], function () {
    Route::get('todos', [CargoController::class, 'todos']);
    Route::get('mostrar', [CargoController::class, 'show']);
    Route::post('actualizar', [CargoController::class, 'update']);
    Route::post('eliminar', [CargoController::class, 'destroy']);
    Route::post('guardar', [CargoController::class, 'store']);
    Route::get('listar', [CargoController::class, 'listar']);
});
Route::group(['prefix' => 'comunicado', 'middleware' => 'auth'], function () {
    Route::get('todos', [ComunicadoController::class, 'todos']);
    Route::get('mostrar', [ComunicadoController::class, 'show']);
    Route::post('actualizar', [ComunicadoController::class, 'update']);
    Route::post('eliminar', [ComunicadoController::class, 'destroy']);
    Route::post('guardar', [ComunicadoController::class, 'store']);
    Route::get('listar', [ComunicadoController::class, 'listar']);
});
Route::group(['prefix' => 'convocatoria', 'middleware' => 'auth'], function () {
    Route::get('todos', [ConvocatoriaController::class, 'todos']);
    Route::get('mostrar', [ConvocatoriaController::class, 'show']);
    Route::post('actualizar', [ConvocatoriaController::class, 'update']);
    Route::post('eliminar', [ConvocatoriaController::class, 'destroy']);
    Route::post('guardar', [ConvocatoriaController::class, 'store']);
    Route::get('listar', [ConvocatoriaController::class, 'listar']);
    Route::get('listar-tipo-convocatorias', [ConvocatoriaController::class, 'tipoConvocatorias']);
    Route::get('listar-etapa-convocatorias', [ConvocatoriaController::class, 'etapaConvocatorias']);
    Route::post('guardar-archivo', [ConvocatoriaController::class, 'storeArchivoConvocatoria']);
    Route::post('actualizar-archivo', [ConvocatoriaController::class, 'updateArchivo']);
    Route::get('mostrar-archivo', [ConvocatoriaController::class, 'showArchivo']);
    Route::post('eliminar-archivo', [ConvocatoriaController::class, 'eliminarArchivo']);
    Route::get('lista-archivos', [ConvocatoriaController::class, 'archivosConvocatoria']);
});
Route::group(['prefix' => 'directorio', 'middleware' => 'auth'], function () {
    Route::get('todos', [DirectorioController::class, 'todos']);
    Route::get('mostrar', [DirectorioController::class, 'show']);
    Route::post('actualizar', [DirectorioController::class, 'update']);
    Route::post('eliminar', [DirectorioController::class, 'destroy']);
    Route::post('guardar', [DirectorioController::class, 'store']);
    Route::get('listar', [DirectorioController::class, 'listar']);
});
Route::group(['prefix' => 'enlace', 'middleware' => 'auth'], function () {
    Route::get('todos', [EnlaceController::class, 'todos']);
    Route::get('mostrar', [EnlaceController::class, 'show']);
    Route::post('actualizar', [EnlaceController::class, 'update']);
    Route::post('eliminar', [EnlaceController::class, 'destroy']);
    Route::post('guardar', [EnlaceController::class, 'store']);
    Route::get('listar', [EnlaceController::class, 'listar']);
});
Route::group(['prefix' => 'entrada', 'middleware' => 'auth'], function () {
    Route::get('todos', [EntradaController::class, 'todos']);
    Route::get('mostrar', [EntradaController::class, 'show']);
    Route::post('actualizar', [EntradaController::class, 'update']);
    Route::post('eliminar', [EntradaController::class, 'destroy']);
    Route::post('guardar', [EntradaController::class, 'store']);
    Route::get('listar', [EntradaController::class, 'listar']);
});
Route::group(['prefix' => 'seccion', 'middleware' => 'auth'], function () {
    Route::get('todos', [SeccionesPrincipalController::class, 'todos']);
    Route::get('mostrar', [SeccionesPrincipalController::class, 'show']);
    Route::post('actualizar', [SeccionesPrincipalController::class, 'update']);
    Route::post('eliminar', [SeccionesPrincipalController::class, 'destroy']);
    Route::post('guardar', [SeccionesPrincipalController::class, 'store']);
    Route::get('listar', [SeccionesPrincipalController::class, 'listar']);
});
Route::group(['prefix' => 'role', 'middleware' => 'auth'], function () {
    Route::get('todos', [RoleController::class, 'todos']);
    Route::get('mostrar', [RoleController::class, 'show']);
    Route::post('actualizar', [RoleController::class, 'update']);
    Route::post('eliminar', [RoleController::class, 'destroy']);
    Route::post('guardar', [RoleController::class, 'store']);
    Route::get('listar', [RoleController::class, 'listar']);
});
Route::group(['prefix' => 'tipoconvocatoria', 'middleware' => 'auth'], function () {
    Route::get('todos', [TipoConvocatoriaController::class, 'todos']);
    Route::get('mostrar', [TipoConvocatoriaController::class, 'show']);
    Route::post('actualizar', [TipoConvocatoriaController::class, 'update']);
    Route::post('eliminar', [TipoConvocatoriaController::class, 'destroy']);
    Route::post('guardar', [TipoConvocatoriaController::class, 'store']);
    Route::get('listar', [TipoConvocatoriaController::class, 'listar']);
});
Route::group(['prefix' => 'organizacion', 'middleware' => 'auth'], function () {
    Route::get('todos', [OrganizacionController::class, 'todos']);
    Route::get('mostrar', [OrganizacionController::class, 'show']);
    Route::post('actualizar', [OrganizacionController::class, 'update']);
    Route::post('eliminar', [OrganizacionController::class, 'destroy']);
    Route::post('guardar', [OrganizacionController::class, 'store']);
    Route::get('listar', [OrganizacionController::class, 'listar']);
});
Route::group(['prefix' => 'redes', 'middleware' => 'auth'], function () {
    Route::get('todos', [RedesController::class, 'todos']);
    Route::get('mostrar', [RedesController::class, 'show']);
    Route::post('actualizar', [RedesController::class, 'update']);
    Route::post('eliminar', [RedesController::class, 'destroy']);
    Route::post('guardar', [RedesController::class, 'store']);
    Route::get('listar', [RedesController::class, 'listar']);
});

Route::group(['prefix' => 'popup', 'middleware' => 'auth'], function () {
    Route::get('todos', [PopupController::class, 'todos']);
    Route::get('mostrar', [PopupController::class, 'show']);
    Route::post('actualizar', [PopupController::class, 'update']);
    Route::post('eliminar', [PopupController::class, 'destroy']);
    Route::post('guardar', [PopupController::class, 'store']);
    Route::get('listar', [PopupController::class, 'listar']);
    Route::post('subir-imagen', [PopupController::class, 'subirImagen']);
    Route::post('eliminar-imagen', [PopupController::class, 'eliminarImagen']);
    Route::get('mostrar-imagenes', [PopupController::class, 'imagenes']);
});

Route::group(['prefix' => 'slider', 'middleware' => 'auth'], function () {
    Route::get('todos', [SliderController::class, 'todos']);
    Route::get('mostrar', [SliderController::class, 'show']);
    Route::post('actualizar', [SliderController::class, 'update']);
    Route::post('eliminar', [SliderController::class, 'destroy']);
    Route::post('guardar', [SliderController::class, 'store']);
    Route::get('listar', [SliderController::class, 'listar']);
});

Route::group(['prefix' => 'noticia', 'middleware' => ['auth:sanctum']], function () {
    Route::get('mostrar', [NoticiaController::class, 'show']);
    Route::post('actualizar', [NoticiaController::class, 'update']);
    Route::post('actualizar-con-imagen', [NoticiaController::class, 'updateconimagen']);
    Route::post('eliminar', [NoticiaController::class, 'destroy']);
    Route::post('guardar', [NoticiaController::class, 'store']);
    Route::get('listar', [NoticiaController::class, 'listar']);
    Route::post('subir-imagen', [NoticiaController::class, 'subirImagen']);
    Route::post('subir-imagen', [NoticiaController::class, 'subirImagen']);
    Route::post('eliminar-imagen', [NoticiaController::class, 'eliminarImagen']);
    Route::get('mostrar-imagenes', [NoticiaController::class, 'imagenes']);
});


Route::group(['prefix' => 'galeria', 'middleware' => 'auth'], function () {
    Route::get('todos', [GaleriaController::class, 'todos']);
    Route::get('mostrar', [GaleriaController::class, 'show']);
    Route::post('actualizar', [GaleriaController::class, 'update']);
    Route::post('eliminar', [GaleriaController::class, 'destroy']);
    Route::post('guardar', [GaleriaController::class, 'store']);
    Route::get('listar', [GaleriaController::class, 'listar']);
    Route::post('subir-imagen', [GaleriaController::class, 'subirImagen']);
    Route::post('eliminar-imagen', [GaleriaController::class, 'eliminarImagen']);
    Route::get('mostrar-imagenes', [GaleriaController::class, 'imagenes']);
});

Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function () {
    Route::get('listar-habilitados',[UserController::class,'habilitados']);
    Route::get('listar-eliminados',[UserController::class,'eliminados']);
    Route::get('listar-todos',[UserController::class,'todos']);
    Route::get('mostrar', [UserController::class, 'show']);
    Route::post('actualizar', [UserController::class, 'update']);
    Route::post('eliminar', [UserController::class, 'destroy']);
    Route::post('eliminar-permanente', [UserController::class, 'eliminarpermanente']);
    Route::post('guardar', [UserController::class, 'store']);
    Route::get('listar', [UserController::class, 'listar']);
    Route::post('reset-password',[UserController::class,'resetclave']);
});
Route::group(['prefix' => 'menu-role', 'middleware' => 'auth'], function () {
    Route::get('menu-roles',[MenuRoleController::class,'mostrarRoleMenus']);
    Route::get('mostrar-menus',[MenuRoleController::class,'mostrarMenus']);
    Route::post('menu-role-guardar',[MenuRoleController::class,'guardarRoleMenu']);
});