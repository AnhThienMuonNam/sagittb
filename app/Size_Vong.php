<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size_Vong extends Model
{
    //
    protected $table="size_vong";
    protected $primaryKey = "id";
    public function category()
    {
      return $this->belongsTo('App\Category','category_id', 'id');
    }

}
