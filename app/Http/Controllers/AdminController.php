<?php


namespace App\Http\Controllers;

use App\game;
use App\artwork;
use App\contestant;
use Illuminate\Http\Request;
use App\Http\Requests\uploadrequest;

class AdminController extends Controller
{
    //
    public function index(){
        $contestants = contestant::get();
        return view('admin.index', compact('contestants'));
    }

    public function newCompetition(Request $request){
        
        
        $data = $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'emptyCard' => 'required|image',
            'images' => 'required|array',
                
                
            ]);
        
        $comp = new game();
        $comp->startDate=$data["startDate"];
        $comp->endDate=$data["endDate"];
        $comp->correctCardName=$data["correctCardName"];
        
        // If the current date is after the start date, but before the end date, the game is still in progress.
        if(\Carbon\Carbon::now()>$data["startDate"] && \Carbon\Carbon::now()<$data["endDate"]){
            $comp->inProgress=1;
        }
        else{
            $comp->inProgress=0;
        }
        
        $imageName= $data["emptyCard"]->getClientOriginalName();
        $data["emptyCard"]->move(public_path('storage/images/emptyCard'),$imageName); 

        $comp->emptyCard=$imageName;

        $comp->save();

        foreach($data["images"] as $image){

            $art = new artwork();
            $art->game_id= $comp->id;
 
            $imageName= $image["artworkImg"]->getClientOriginalName();
            $image["artworkImg"]->move(public_path('storage/images/fullArt'),$imageName); 
            $art->artworkImg=$imageName; 
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

    public function delete ($id)
    {
        contestant::where('id', $id)->delete();
        return redirect('/admin');
    }

}
