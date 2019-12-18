<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = array('name', 'unity', 'quantityinit', 'code');

    public function standards(){
    	return $this->hasMany(Standard::class);
    }

    public function kardexmps(){
    	return $this->hasMany(Kardexmp::class);
    }
}
