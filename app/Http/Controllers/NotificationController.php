<?php

namespace App\Http\Controllers;

use App\Models\NoticeBoard;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = NoticeBoard::where('is_publish', true)
            ->latest()
            ->paginate(12);

        return view('pages.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $notification = NoticeBoard::where('is_publish', true)->findOrFail($id);

        return view('pages.notifications.show', compact('notification'));
    }
}
