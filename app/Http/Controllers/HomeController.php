<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return "ini dari home controller";
    }

    public function show_html(){
        return view('home.halo');
    }
    
    public function belajar_blade(){
        $nama = "kucing";
        $nama_bunga = ['mawar', 'melatih', 'kenanga'];
        return view('home.belajar_blade', compact(
            'nama', 'nama_bunga'));
        }

    public function penggunaan_layouts(){
        return view('home.penggunaan_layouts');
    }

    public function contoh(){
        return view('home.contoh');
    }

    public function contoh_post(Request $request){
        $nama = $request->get('nama');
        return "ini dari function contoh_post dengan nama=".$nama;
    }
}
