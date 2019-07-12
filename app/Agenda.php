<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['name'];
    public function meeting()
    {
        return $this->belongsTo('App\Metting');
    }
}
