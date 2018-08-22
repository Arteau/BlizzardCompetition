<?php

namespace App\Http\Controllers;

use App\game;
use App\answer;
use App\contestant;
use App\artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\uploadrequest;

class PagesController extends Controller
{

    public function index()
    {
        $game=DB::table('games')->where('inProgress',1)->get();
        $lastGame=DB::table('games')->where('inProgress',0)->orderBy('created_at', 'desc')->first();

        if(count($game) === 0){
            
            if(isset($lastGame)){
 
                $lastGameAnswers = answer::whereHas('contestant', function ($query) {
                    $query->where('winner', 1);
                    })->where('game_id', $lastGame->id)->first();

                    
                if(isset($lastGameAnswers)){
                    $winnerName = $lastGameAnswers->contestant->name.' '.$lastGameAnswers->contestant->lastName;
                    return view('pages.index',compact('winnerName'));
                }

            }
            else{
                return view('pages.index');
            }
    
        }

        if(isset($lastGame)){
            $lastGameAnswers = answer::whereHas('contestant', function ($query) {
                $query->where('winner', 1);
                })->where('game_id', $lastGame->id)->first();

            $winnerName = $lastGameAnswers->contestant->name.' '.$lastGameAnswers->contestant->lastName;
            return view('pages.index',compact('game', 'winnerName'));
        }
       
        return view('pages.index',compact('game'));
    }

    public function play($id){
        $game=DB::table('games')->where('inProgress',1)->get();
        $emptyCard = $game[0]->emptyCard;
        $artworks=DB::table('artworks')->where('game_id', $game[0]->id)->get();
        $data = ['emptyCard'=>$emptyCard, 'artworks'=>$artworks];
        return view('pages.play')->with('data', $data);
    }

    public function answer(Request $data){
        
        $currentGame = DB::table('games')->where('inProgress', 1)->get();
        $currentGame_id = $currentGame[0]->id;
        $answer = new answer();
        $contestant = new contestant();

        $contestant->name = $data["name"];
        $contestant->lastName = $data["lastName"];
        $contestant->address = $data["address"];
        $contestant->city = $data["city"];
        $contestant->email = $data["email"];
        $contestant->ip = \Request::ip();
        $contestant->save();
        
        $answer->game_id = $currentGame_id;
        $answer->cardArtNr = $data["cardArtNr"];
        $answer->cardName = $data["cardName"];
        $contestant->answers()->save($answer);
        return redirect("/thanks");
    }

    public function thanks(){

        return view('pages.thanks');
    }


}

