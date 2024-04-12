<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\Directorio;
use App\Models\Enlace;
use App\Models\Galeria;
use App\Models\ImagenGaleria;
use App\Models\Organizacion;
use App\Models\Menu;
use App\Models\Nav;
use App\Models\Noticia;
use App\Models\Popup;
use App\Models\RedSocial;
use App\Models\SeccionesPrincipal;
use App\Models\Slider;
use Carbon\Carbon;
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
        $data['registrosgaleria'] = Galeria::with([
            'imagenes:id,nombreimagen',
            'primeraImagen:id,nombreimagen,galeria_id'
            ])->get();
        $data['organizacion'] = Organizacion::first();
        $data['redessociales'] = RedSocial::where('url', '!=', '#')->get();
        $data['enlaces'] = Enlace::get();
        $data['noticias']=Noticia::with('imagen')->latest()->limit(6)->get();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['comunicados'] =Comunicado::limit(4)->get();
        //return $data['comunicados'];
        return view('app', $data);
    }
    public function noticia(Request $request){
        $fechaActual = Carbon::now();
        $data['titulo']='NOTICIAS';
        $data['fechaActual'] = $fechaActual->isoFormat('dddd D [de] MMMM [de] YYYY', 'Do [de] MMMM [de] YYYY');
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['redessociales'] = RedSocial::where('url', '!=', '#')->get();
        $data['enlaces'] = Enlace::get();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['noticia'] = Noticia::with('imagenes')->where('slug', $request->s)->first();
        return view('paginas.noticia', $data);
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
    public function galeria(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['registrosgaleria'] = Galeria::with([
            'imagenes:id,nombreimagen',
            'primeraImagen:id,nombreimagen,galeria_id'
            ])->get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='Galeria';
        $data['pagina']='paginas.galeria';
        return view('paginas.galeria', $data);            
    }
    public function galeriaImagenes(Request $request){
        $data['imagenes']=ImagenGaleria::where('galeria_id', $request->id)->get();
        $data['organizacion'] = Organizacion::first();
        $data['galeria'] = Galeria::where('id', $request->id)->first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['titulo']='GALERIA DE IMAGENES';
        $data['pagina']='paginas.imagenes';
        return view('paginas.imagenes', $data); 
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
        $data['registros']=Directorio::with('cargo:id,nombre')->where('es_activo', 1)->get();
        //return $data['registros'];
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

    public function produccionAgropecuaria(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='Produccion Agropecuaria';
        return view('paginas.produccion_agropecuaria', $data); 
    }

    public function enfermeriaTecnica(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='Enfermeria Tecnica';
        return view('paginas.enfermeria_tecnica', $data); 
    }
    

    public function mecanicaAutomotriz(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['enlaces'] = Enlace::get();
        $data['titulo']='Mecanica Automotriz';
        return view('paginas.mecanica_automotriz', $data); 
    }
    

}
