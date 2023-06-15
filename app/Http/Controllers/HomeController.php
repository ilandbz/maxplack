<?php

namespace App\Http\Controllers;
use App\Models\Organizacion;
use App\Models\Menu;
use App\Models\Nav;
use App\Models\RedSocial;
use App\Models\SeccionesPrincipal;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    public function __invoke(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['secciones']=SeccionesPrincipal::get();
        $data['organizacion'] = Organizacion::first();
        $data['redessociales'] = RedSocial::get();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        return view('app', $data);
    }
    public function nosotros(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['redessociales'] = RedSocial::get();
        $data['titulo']='Nosotros';
        $data['page']='paginas.nosotros';
        return view('app', $data);    
    }

    
    public function prueba(){
        $data['sliders']=Slider::where('es_activo', 1)->get();
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        $data['titulo']='Prueba';
        $data['page']='componentes.pagina';
        return view('app', $data);        
        // $content = "Este es el contenido del archivo de texto.";
        // Storage::disk('public')->put('archivo.txt', $content);
    }

}
