<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = array('quantity', 'observation', 'orderp_id', 'material_id');

    public function orderp(){
    	return $this->belongsTo(Ordenp::class);
    }

    public function kardexmps(){
    	return $this->hasMany(Kardesmp::class);
    }

    public function material(){
    	return $this->belongsTo(Material::class);
    }
}
