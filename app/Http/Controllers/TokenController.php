<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;
use App\User;

class TokenController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'user_id' => 'required|int',
            'push_token' => 'required'
        ]);
        Token::create($attributes);
        return response()->json(['message' => 'Token stored successfully'], 201);
    }

    public function view($user_id)
    {
        $push_token = Token::where('user_id', $user_id)->firstOrFail();
        return response()->json($push_token, 200);
    }
}
