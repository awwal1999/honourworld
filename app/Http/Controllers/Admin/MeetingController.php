<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meeting;

class MeetingController extends Controller
{
    public function create()
    {
        return view('meetings.create');
    }
    
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);
        $notify = new Client();
        $notify->request(
            'POST',
            'https://exp.host/--/api/v2/push/send',
            [
                'form_params' => [
                    'username' => 'sayo_paul',
                    'to' => 'ExponentPushToken[BdGN-DBDseA2WG8VkkMAQi]',
                    'body' => 'Mr Tunji is a fine boy!!'
                ]
            ]
        );
        return redirect()->back()->with('success', 'meeting created successfully');
    }

    public function view(Meeting $meeting)
    {
        return view('meetings.view', compact('meeting'));
    }
}
