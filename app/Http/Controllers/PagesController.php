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
        // Get the game currently in progress.
        $game=DB::table('games')->where('inProgress',1)->get();
        
        // Get the previous game.
        $lastGame=DB::table('games')->where('inProgress',0)->orderBy('created_at', 'desc')->first();

        // Check if there actually is a game still in progress.
        if(count($game) === 0){
            
            // Check if there was a game before the one currently in progress.
            if(isset($lastGame)){
 
                // Get the winning contestant of the previous game.
                $lastGameWinner = answer::whereHas('contestant', function ($query) {
                    $query->where('winner', 1);
                    })->where('game_id', $lastGame->id)->first();

                // Check if there actually was a winner of the previous game.
                if(isset($lastGameWinner)){
                    
                    // If there was a winner, pass his/her name through the index view to be used in the "Yesterday's winner" box.
                    $winnerName = $lastGameWinner->contestant->name.' '.$lastGameWinner->contestant->lastName;
                    return view('pages.index',compact('winnerName'));
                }

            }
            else{
                // If there was no winner, just return the index view without a name.
                return view('pages.index');
            }
    
        }
        // If there is no game currently in progress, check if there was a previous game that has ended
        else if(isset($lastGame)){
            
            // Get the winning contestant of the previous game.
            $lastGameWinner = answer::whereHas('contestant', function ($query) {
                $query->where('winner', 1);
                })->where('game_id', $lastGame->id)->first();

            // Check if there actually was a winner of the previous game.
            if(isset($lastGameWinner)){
                    
                // If there was a winner, pass his/her name through the index view to be used in the "Yesterday's winner" box.
                $winnerName = $lastGameWinner->contestant->name.' '.$lastGameWinner->contestant->lastName;
                return view('pages.index',compact('winnerName'));
            }
        }
        else{
            return view('pages.index',compact('game'));
        }


       
    }

    public function play($id){
        
        // Get the correct game assets from the database for the game currently in progress.
        $game=DB::table('games')->where('inProgress',1)->get();
        $emptyCard = $game[0]->emptyCard;
        $artworks=DB::table('artworks')->where('game_id', $game[0]->id)->get();
        $data = ['emptyCard'=>$emptyCard, 'artworks'=>$artworks];
        return view('pages.play')->with('data', $data);
    }

    public function answer(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'cardArtNr' => 'required',
            'cardName' => 'required',
            ]);
        
        // Save the contestant's info and answers to their respective DB tables.
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

