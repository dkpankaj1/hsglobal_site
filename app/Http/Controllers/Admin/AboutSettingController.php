<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class AboutSettingController extends Controller
{
    public function edit()
    {
        $aboutSetting = AboutSetting::firstOrCreate([]);

        return view('admin.about-setting.edit', compact('aboutSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name'      => 'required|string|max:255',
            'established_year' => 'nullable|string|max:10',
            'affiliation'      => 'nullable|string|max:255',
            'affiliation_no'   => 'nullable|string|max:50',
            'school_no'        => 'nullable|string|max:50',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'about_image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'highlights'       => 'nullable|array',
            'highlights.*'     => 'string|max:255',
            'achievements'     => 'nullable|array',
            'achievements.*.icon'  => 'nullable|string|max:50',
            'achievements.*.title' => 'required|string|max:200',
            'achievements.*.desc' => 'nullable|string|max:500',
            'achievements.*.year' => 'nullable|string|max:10',
        ]);

        try {
            $aboutSetting = AboutSetting::firstOrCreate([]);
            $imageHandler = new ImageHandler('about');

            $data = $request->only([
                'school_name',
                'established_year',
                'affiliation',
                'affiliation_no',
                'school_no',
                'description',
                'long_description',
            ]);
            $data['highlights']   = $request->input('highlights', []);
            $data['achievements'] = $request->input('achievements', []);

            if ($request->hasFile('about_image')) {
                if ($aboutSetting->about_image) {
                    $imageHandler->delete($aboutSetting->about_image);
                }
                $data['about_image'] = $imageHandler->upload($request->file('about_image'));
            }

            $aboutSetting->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'About Settings']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->back();
    }
}
