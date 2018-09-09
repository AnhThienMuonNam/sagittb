<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size_Hat extends Model
{
    //
    protected $table="size_hat";
    protected $primaryKey = "id";
    public function category()
    {
      return $this->belongsTo('App\Category','category_id', 'id');
    }
}
