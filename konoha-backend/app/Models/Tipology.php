<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipology extends Model
{
    public function bonsais(){

        return $this->belongsToMany(Bonsai::class);
        
    }
}
