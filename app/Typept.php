<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typept extends Model
{
    protected $fillable = array('name');

    public function products(){
    	return $this->hasMany(Product::class);
    }
}
