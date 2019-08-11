<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_Method extends Model
{
	protected $table = "payment_method";
	protected $primaryKey = "id";

	public function orders()
	{
		return $this->hasMany('App\Order', 'payment_method_id', 'id');
	}
}
