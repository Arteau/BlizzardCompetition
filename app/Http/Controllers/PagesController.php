<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        return view('pages.index');
    }

    public function play(){
        $data = array(
            'cardArtOptions' => ['cardArt1', 'cardArt2', 'cardArt3'],
            'cardImage' => 'image'    
        );

        return view('pages.play')->with($data);
    }



}

