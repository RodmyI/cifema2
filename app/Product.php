<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = array('name', 'unit', 'cantidadinit', 'code', 'price', 'img_prod', 'data_sheet', 'stock', 'status', 'typept_id');

    public function orderps(){
    	return $this->hasMany(Orderp::class);
    }

    public function typept(){
    	return $this->belongsTo(Typept::class);
    }
}
