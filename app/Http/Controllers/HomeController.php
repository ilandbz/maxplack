<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use App\Models\Organizacion;
use App\Models\Menu;
use App\Models\Nav;
use App\Models\Popup;
use App\Models\RedSocial;
use App\Models\SeccionesPrincipal;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    public function __invoke(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['popup']=Popup::with('imagenesPopup')
        ->where('es_activo', 1)
        ->orderBy('created_at', 'desc')
        ->first();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['redessociales'] = RedSocial::where('url', '!=', '#')->get();
        $data['enlaces'] = Enlace::get();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        return view('app', $data);
    }
    
    public function nosotros(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['titulo']='PRUEBA DE PLANTILLA';
        $data['page']='paginas.nosotros';
        return view('app', $data);    
    }

    public function quienessomos(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='QUIENES SOMOS';
        $data['pagina']='paginas.quienessomos';
        return view('paginas.quienessomos', $data);    
    }
    
    public function misionvision(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='MISION / VISION';
        $data['pagina']='paginas.misionvision';
        return view('paginas.misionvision', $data); 
    }
    public function directorio(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='DIRECTORIO INSTITUCIONAL';
        $data['pagina']='paginas.directorio';
        return view('paginas.directorio', $data); 
    }

    public function historia(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='NUESTRA HISTORIA';
        $data['pagina']='paginas.historia';
        return view('paginas.historia', $data);   
    } 
    public function turismo(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='NUESTRO TURISMO';
        $data['pagina']='paginas.turismo';
        return view('paginas.turismo', $data);   
    } 

    public function prueba(){
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::where('url', '!=', '#')->get();
        $data['titulo']='Prueba';
        $data['enlaces'] = Enlace::get();
        $data['paginaprueba']='paginas.prueba';
        
        return view('app', $data);
    }

}
