<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyorder extends Model
{
    protected $fillable = array('number', 'date_issue', 'reception_date', 'orderp_id', 'status');

    public function materials(){
    	return $this->belongsToMany(Material::class)->withPivot('quantity', 'observation', 'class_item')->withTimestamps();
    }

}
