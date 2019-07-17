<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $with = ['agendas', 'category'];

    protected $fillable = [
        'title', 'description', 'photo', 'venue', 'date', 'category_id'
    ];

    public function agendas()
    {
        return $this->hasMany('App\Agenda');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function isGeneral()
    {
        return strtolower( $this->category()->first()->name) == 'general';
    }

    public function isHod()
    {
        return strtolower($this->category()->first()->name) == 'hod';
    }

    public function isExecutive()
    {
        return strtolower($this->category()->first()->name) == 'executive';
    }
}
