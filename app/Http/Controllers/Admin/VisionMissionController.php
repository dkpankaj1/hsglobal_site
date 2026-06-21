<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function edit()
    {
        $visionMission = VisionMission::firstOrCreate([]);

        return view('admin.vision-mission.edit', compact('visionMission'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'vision'  => 'required|string|max:5000',
            'mission' => 'required|string|max:5000',
        ]);

        try {
            $visionMission = VisionMission::firstOrCreate([]);
            $visionMission->update($request->only(['vision', 'mission']));

            Toastr::success(__('messages.success.updated', ['item' => 'Vision & Mission']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->back();
    }
}
