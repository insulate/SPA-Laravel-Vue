<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class NotificationController extends Controller
{
    public function index()
    {
        return [
            'read' => auth()->user()->readNotifications,
            'unRead' => auth()->user()->unreadNotifications,
        ];
    }

    public function markAsRead(Request $request){
        $user = User::find(auth()->id());
        $user->unreadNotifications->where('id', $request->id)->markAsRead();
    }
}
