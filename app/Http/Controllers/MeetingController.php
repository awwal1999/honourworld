<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;
use App\Category;
use App\Http\Resources\Meetings as AppMeeting;
use App\Http\Resources\Meeting as MeetingResource;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( strtolower(auth()->user()->category()->first()->name) == 'executive') {
            $meeting = Meeting::latest()->paginate(5);
            // return response()->json( new AppMeeting($meeting), 200);
            return response()->json( MeetingResource::collection($meeting), 200);
        }

        $user_category = auth()->user()->category_id;
        $general_category = Category::where('name', 'general')->first()->id;
        $meeting = Meeting::latest()->where('category_id', $user_category)->orWhere('category_id', $general_category)->paginate(5);
        // return response()->json(new AppMeeting($meeting), 200);
        return response()->json( MeetingResource::collection($meeting), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ( auth()->user()->can('create', Meeting::class) ) {
            $attributes = request()->validate([
                'title' => 'required|string|min:5',
                'description' => 'required|string',
                'photo' => 'required',
                'venue' => 'required|string',
                'date' => 'required',
            ]);

            Meeting::create($attributes);
            return response()->json([
                'message' => 'Meeting created successfully'
            ],201);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 301);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    { 
        if ( $meeting->isGeneral() ) {
            return response()->json($meeting, 200);
        }

        if ( $meeting->isHod() ) {
            if(auth()->user()->category()->first()->name == 'general') {
                return response()->json(['message' => 'You are not authorised to view this'], 403);
            }
            return response()->json($meeting, 200);
        }
        if ( $meeting->isExecutive() ) {
            if(auth()->user()->category()->first()->name != 'executive') {
                return response()->json(['message' => 'You are not authorised to view this'], 403);
            }

            return response()->json($meeting, 200);
        }
        return response()->json('Nothing to show', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        if (auth()->user()->can('create', Meeting::class)) {
            $attributes = request()->validate([
                'title' => 'required|string|min:5',
                'description' => 'required|string',
                'photo' => 'required',
                'venue' => 'required|string',
                'date' => 'required',
            ]);

            $meeting->update($attributes);
            return response()->json([
                'message' => 'Meeting updated successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 301);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
