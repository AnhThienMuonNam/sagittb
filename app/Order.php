<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = "order";
	protected $primaryKey = "id";

	public function order_details()
	{
		return $this->hasMany('App\Order_Detail', 'order_id', 'id');
	}

	public function order_status()
	{
		return $this->belongsTo('App\Order_Status', 'order_status_id', 'id');
	}

	public function payment_method()
	{
		return $this->belongsTo('App\Payment_Method', 'payment_method_id', 'id');
	}

	public function estimated_delivery()
	{
		return $this->belongsTo('App\Estimated_Delivery', 'estimated_delivery_id', 'id');
	}
}
