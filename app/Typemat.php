<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typemat extends Model
{
    protected $fillable = array('name');

    public function materials(){
    	return $this->hasMany(Material::class);
    }
}
