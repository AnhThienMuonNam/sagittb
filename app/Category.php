<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
 	  protected $table = "category";
    protected $primaryKey = "id";

    public function products()
  	{
  		return $this->hasMany('App\Product','category_id', 'id');
  	}

    public function size_hats()
  	{
  		return $this->hasMany('App\Size_Hat','category_id', 'id');
  	}

  	public function charms()
  	{
  		return $this->hasMany('App\Charm','category_id', 'id');
  	}

    public function kieudays()
  	{
  		return $this->hasMany('App\Kieuday','category_id', 'id');
  	}

}
