<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function basic_unit(){
     return $this->belongsTo('App\Models\Basic_unit');
 }
}
