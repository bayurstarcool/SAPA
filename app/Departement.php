<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
