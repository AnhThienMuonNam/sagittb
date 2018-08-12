<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charm extends Model
{
    //
    protected $table="charm";
    protected $primaryKey = "id";
    
    public function category()
	{
		return $this->belongsTo('App\Category','category_id', 'id');
	}
}
