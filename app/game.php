<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $fillable = ["startDate", "endDate", "inProgress", "correctCardArtNr", "correctCardName"];

    //
    public function answers() {
        return $this->hasMany(answer::class);
    }
    public function artworks() {
        return $this->hasMany(artwork::class);
    }
}
