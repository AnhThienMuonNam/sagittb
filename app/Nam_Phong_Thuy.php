<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nam_Phong_Thuy extends Model
{
    //
    protected $table="nam_phong_thuy";
    protected $primaryKey = "id";

	public function phong_thuy()
	{
		return $this->belongsTo('App\Phong_Thuy','phong_thuy_id', 'id');
	}

}
