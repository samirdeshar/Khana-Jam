<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    use Notifiable;
    public function markAsRead(Request $request)
    {
       
            $notificationId = $request->input('notification_id');

        DB::table('notifications')
            ->where('id', $notificationId)
            ->update(['read_at' => now()]);

        return response()->json(['success' => true]);
    }
}
