<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('name', 'unit', 'cantidadinit', 'code', 'state', 'typept_id');

    public function orderps(){
    	return $this->hasMany(Orderp::class);
    }

    public function kardexpts(){
    	return $this->hasMany(Kardexpt::class);
    }

    public function typept(){
    	return $this->belongsTo(Typept::class);
    }
}
