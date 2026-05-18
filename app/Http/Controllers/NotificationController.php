<?php

namespace App\Http\Controllers;

use App\Data\MockData;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = MockData::notifications();

        return view('pages.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $notification = MockData::notification($id);

        if (!$notification) {
            abort(404, 'Notification not found');
        }

        return view('pages.notifications.show', compact('notification'));
    }
}
