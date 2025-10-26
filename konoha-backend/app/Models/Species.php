<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    public function bonsais() {

        return $this->hasMany(Bonsai::class);
        
    }
}
