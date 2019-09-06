<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compound_unit extends Model
{
    public function basic_unit(){
        return $this->hasMany('App\Models\Basic_unit');
    }
}
