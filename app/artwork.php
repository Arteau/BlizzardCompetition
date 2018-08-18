<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artwork extends Model
{
    protected $fillable = ["game_id", "artworkImg", "correctAnswer"];

    //
    public function game() {
        return $this->belongsTo(game::class);
    }
}
