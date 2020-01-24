<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrymp extends Model
{
    protected $fillable = array('number', 'document_type', 'document_number', 'provider', 'date_entry', 'received_by', 'status');

    public function materials(){
    	return $this->belongsToMany(Material::class)->withPivot('quantity')->withTimestamps();
    }
}
