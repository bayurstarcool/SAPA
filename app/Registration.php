<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
