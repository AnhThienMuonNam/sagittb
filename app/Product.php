<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = "product";
	protected $primaryKey = "id";

	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}

	public function order_details()
	{
		return $this->hasMany('App\Order_Detail', 'product_id', 'id');
	}

	public function wish_lists()
	{
		return $this->hasMany('App\Wish_List', 'user_id', 'id');
	}

	public function piece()
	{
		return $this->belongsTo('App\Piece', 'piece_id', 'id');
	}
}
