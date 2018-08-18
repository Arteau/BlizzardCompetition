<?php


namespace App\Http\Controllers;

use App\game;
use App\artwork;
use Illuminate\Http\Request;
use App\Http\Requests\uploadrequest;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }

    public function newCompetition(Request $data){
        // dd($data);
        $comp = new game();
        $comp->startDate=$data["startDate"];
        $comp->endDate=$data["endDate"];
        $comp->correctCardName=$data["correctCardName"];
        
        if(\Carbon\Carbon::now()>$data["startDate"] && \Carbon\Carbon::now()<$data["endDate"]){
            $comp->inProgress=1;
        }
        else{
            $comp->inProgress=0;
        }

        // Image upload
      
        $photoName=time() . '.' . $data["emptyCard"]->getClientOriginalExtension(); // concat time for unique name
        $data["emptyCard"]->move(public_path('storage/images/emtpyCard'),$photoName); // photoname = path
        $comp->emptyCard=$photoName;

        $comp->save();

        foreach($data["images"] as $image){

            $art = new artwork();
            $art->game_id= $comp->id;
            $photoName=time() . '.' . $image["artworkImg"]->getClientOriginalExtension(); // concat time for unique name
            $image["artworkImg"]->move(public_path('storage/images/fullArt'),$photoName); // photoname = path
            $art->artworkImg=$photoName; 
            if(isset($image['correctAnswer'])){
                $art->correctAnswer = 1;
            }
            else{
                $art->correctAnswer = 0;    
            }
            $art->save();
        }

        return redirect("/admin");

    }

}