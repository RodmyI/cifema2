<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = array('name', 'unity', 'quantityinit', 'code', 'stock', 'status', 'typemat_id');

    public function typemat(){
    	return $this->belongsTo(Typemat::class);
    }

    public function orderps(){
    	return $this->belongsToMany(Orderp::class)->withPivot('quantity', 'observation')->withTimestamps();
    }

    public function buyorders(){
    	return $this->belongsToMany(Buyorder::class)->withTimestamps();
    }

    public function kardexmps(){
        return $this->belongsToMany(Kardexmp::class)->withPivot('quantity')->withTimestamps();
    }

    public function outputmps(){
        return $this->belongsToMany(Outputmp::class)->withTimestamps();
    }
}