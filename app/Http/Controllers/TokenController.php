<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;

class TokenController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'user_id' => 'required|int',
            'token' => 'required'
        ]);
        Token::create($attributes);
        return response()->json(['message' => 'Token stored successfully'], 201);
    }
}
