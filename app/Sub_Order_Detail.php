<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Order_Detail extends Model
{
    //
    protected $table="sub_order_detail";
    protected $primaryKey = "id";

	public function order_detail()
	{
		return $this->belongsTo('App\Sub_Order_Detail','order_detail_id', 'id');
	}

}
