<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderp extends Model
{
    protected $fillable = array('quantity', 'dateinit', 'number', 'product_id');

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function materials(){
    	return $this->belongsToMany(Material::class)->withPivot('quantity', 'observation', 'missing_amount')->withTimestamps();
    }

    /**
     * Get the buyorder for the Orderp.
     */
    public function buyorder()
    {
        return $this->hasOne('App\Buyorder');
    }

    /**
     * Get the outputmps for the Orderp.
     */
    public function outputmps(){
        return $this->hasMany(Outputmp::class);
    }
}