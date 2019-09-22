<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'meeting_id', 'title', 'description', 'date', 'date2', 'photo'
    ];
}
