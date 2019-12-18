<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderp extends Model
{
    protected $fillable = array('quantity', 'dateinit', 'number', 'product_id');

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function standards(){
    	return $this->hasMany(Standard::class);
    }
}
