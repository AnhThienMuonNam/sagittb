<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish_List extends Model
{
	protected $table = "wish_list";
	protected $primaryKey = "id";

	public function product()
	{
		return $this->belongsTo('App\Product', 'product_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
