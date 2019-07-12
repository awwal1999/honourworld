<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;

class MeetingLikesController extends Controller
{
    public function likes(Meeting $meeting)
    {
        auth()->user()->meetings()->toggle(request('meeting'));
        return response()->json(['message' => 'request successful'], 200);
    }
}
