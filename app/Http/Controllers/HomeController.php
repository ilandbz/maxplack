<?php

namespace App\Http\Controllers;
use App\Models\Organizacion;
use App\Models\Menu;
use App\Models\Nav;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $data['organizacion'] = Organizacion::first();
        $data['menus'] = Nav::with('children')->whereNull('padre_id')->get();
        return view('app', $data);
    }

}
