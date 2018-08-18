<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class answer extends Model
{
    //
    protected $fillable = ["game_id", "contestant_id", "cardArtNr", "cardName"];
    public function contestant() {
        return $this->belongsTo(contestant::class);
    }
    public function game() {
        return $this->belongsTo(game::class);
    }
}
