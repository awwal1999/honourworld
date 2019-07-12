<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingAgendasController extends Controller
{
    public function store(Meeting $meeting)
    {
        $attributes = request()->validate([ 'name' => 'required|min:3']);
        $meeting->agendas()->create($attributes);

        return response()->json([
            'message' => 'Agenda added successfully'
        ], 201);
    }
}
