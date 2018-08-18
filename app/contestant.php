<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contestant extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ["name", "lastName", "address", "city", "email", "ip"];

    public function answers() {
        return $this->hasMany(answer::class);
    }
}
