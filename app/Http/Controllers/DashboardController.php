<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $foto = Foto::all();
        return view('dashboard', compact('foto'));
    }

    public function view_profil(){
        $foto = Foto::all();
        return view('profil.index', compact('foto'));
    }
}
