<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $game=DB::table('games')->where('inProgress',1)->get();
       
        return view('pages.index',compact('game'));
    }

    public function play($id){
        //dd($id);
        $data = array(
            'cardArtOptions' => ['cardArt1', 'cardArt2', 'cardArt3'],
            'cardImage' => 'image'    
        );

        return view('pages.play')->with($data);
    }

    public function thanks(){

        return view('pages.thanks');
    }


}

