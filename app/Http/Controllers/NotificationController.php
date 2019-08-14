<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->get();
        return response()->json($notifications, 200);
    }

    public function show(Notification $notification)
    {
        return $notification;
        if (!! ($notification == NULL)) {
            return response()->json($notification, 200);
        }
        return response()->json('Resource not found', 404);
    }
}
