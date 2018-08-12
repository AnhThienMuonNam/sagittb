<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    //
    protected $table="order_detail";
    protected $primaryKey = "id";

	public function order()
	{
		return $this->belongsTo('App\Order','order_id', 'id');
	}

	public function product()
	{
		return $this->belongsTo('App\Product','product_id', 'id');
	}

	public function sub_order_details()
	{
		return $this->hasMany('App\Sub_Order_Detail','order_detail_id', 'id');
	}

}
