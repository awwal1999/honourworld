<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public function meeting()
    {
        return $this->belongsTo('App\Metting');
    }
}
