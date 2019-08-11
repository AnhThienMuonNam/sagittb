<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kieuday extends Model
{
  protected $table = "kieuday";
  protected $primaryKey = "id";
  public function category()
  {
    return $this->belongsTo('App\Category', 'category_id', 'id');
  }
}
