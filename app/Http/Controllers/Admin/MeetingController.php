<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meeting;
use App\Notification;
use Carbon\Carbon;

class MeetingController extends Controller
{

    public function index()
    {
        $meetings = Meeting::latest()->get();
        return view('home', compact('meetings'));
    }

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
            'date' => 'required',
        ]);
        
        $meeting = Meeting::create($attributes);
        Notification::create([
            'meeting_id' => $meeting->id,
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'photo' => $meeting->photo,
            'date' => $attributes['date'],
            'date2' => Carbon::parse('Monday next week')
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
    
    public function edit(Meeting $meeting)
    {
        return view('meetings.edit', compact('meeting'));
    }

    public function update(Meeting $meeting)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'date'  => 'required'
        ]);
        $meeting->update($attributes);
        Notification::create([
            'meeting_id' => $meeting->id,
            'title' => $attributes['title'],
            'description' => 'Update  ' .$attributes['description'],
            'photo' => $meeting->photo,
            'date' => $attributes['date'],
            'date2' => Carbon::parse('Monday next week')
        ]);
        $notify = new Client();
        $notify->request(
            'POST',
            'https://exp.host/--/api/v2/push/send',
            [
                'form_params' => [
                    "sound" => "default",
                    'to' => 'ExponentPushToken[BdGN-DBDseA2WG8VkkMAQi]',
                    'title' => 'Update' . $meeting->title,
                    'body' => $meeting->description
                ]
            ]
        );
        return redirect()->back()->with('success', 'meeting updated successfully');
    }
}
