<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lichsu_Tracuu extends Model
{
    protected $table = "lichsu_tracuu";
    protected $primaryKey = "id";

    public function category()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
