<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['name'];

    public function meeting()
    {
        return $this->belongsTo('App\Meeting');
    }

    public function path()
    {
        return "/admin/meetings/{$this->meeting->id}/agendas/{$this->id}";
    }
}
