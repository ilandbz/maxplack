<?php

namespace App\Http\Controllers;
use App\Models\Organizacion;
use Illuminate\Http\Request;

class IntranetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizacion = Organizacion::first();
        return view('intranet.app', compact('organizacion'));
    }


}
