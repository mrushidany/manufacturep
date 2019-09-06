<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basic_unit extends Model
{
    public function finished_product(){
        return $this->hasMany('App\Models\Product');
    }
    public function compound_unit(){
        return $this->belongsTo('App\Models\Compound_unit');
    }
}
