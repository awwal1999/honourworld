<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $with = ['agenda'];

    public function agenda()
    {
        return $this->hasMany('App\Agenda');
    }
}
