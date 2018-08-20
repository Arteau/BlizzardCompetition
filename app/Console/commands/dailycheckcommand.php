<?php
namespace App\Console\Commands;
use App\User;
use App\winnaar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class dailycheckcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily-check';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily check.';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $activeGame = DB::table('games')->where('inProgress', 1)->first();
        if(isset($activeGame)){
            $artwork = DB::table('artworks')->where('game_id', $activeGame->id)->where('correctAnswer', 1)->first();
            
            if(isset($artwork))
            {
                $winner = DB::table('answers')->where('cardName', $activeGame->correctCardName)->where('cardArtNr', $artwork->id)->first();
            
                if(isset($winner)){
                    DB::table('contestants')->where('id', $winner->contestant_id)->update(['winner' => 1]);
                    DB::table('games')->where('id', $activeGame->id)->update(['inProgress' => 0]);
                }
            }

            
        }

    }

}
