<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolutionmp extends Model
{
    protected $fillable = array('number', 'date_dev', 'orderp_id', 'received_by', 'status');

    public function orderp(){
    	return $this->belongsTo(Orderp::class);
    }

    public function materials(){
    	return $this->belongsToMany(Material::class)->withPivot('quantity_standard','delivered_quantity','quantity_output','observation')->withTimestamps();
    }
}
