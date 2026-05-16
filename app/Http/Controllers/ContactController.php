<?php

namespace App\Http\Controllers;

use App\Data\MockData;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $info = MockData::contactInfo();

        return view('pages.contact', compact('info'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        // TODO: Save to DB and/or send email notification when admin panel is ready.
        // Mail::to(config('mail.admin_address'))->send(new ContactMail($validated));

        return redirect()->route('contact')
            ->with('success', 'Thank you for contacting us. We will get back to you shortly.');
    }
}
