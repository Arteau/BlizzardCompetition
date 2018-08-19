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
        $game=DB::table('games')->where('inProgress',1)->get();
        $emptyCard = $game[0]->emptyCard;
        $artworks=DB::table('artworks')->where('game_id', $game[0]->id)->get();
        // dd($artworks);
        $data = ['emptyCard'=>$emptyCard, 'artworks'=>$artworks];
        
        // dd($data);
        // dd($data['emptyCard']);
        // dd($data['artworks'][0]->artworkImg);


        return view('pages.play')->with('data', $data);
    }

    public function answer(){
        return redirect("/thanks");
    }

    public function thanks(){

        return view('pages.thanks');
    }


}

