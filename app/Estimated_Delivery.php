<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimated_Delivery extends Model
{
    //
    protected $table="estimated_delivery";
    protected $primaryKey = "id";
    
    public function orders()
	{
		return $this->hasMany('App\Order','estimated_delivery_id', 'id');
	}
}
