<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonsai extends Model
{
    public function species() {

        return $this->belongsTo(Species::class);

    }

    
    public function tipologies() {

        return $this->belongsToMany(Tipology::class);

    }
}
