<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', ['setting' => Setting::first()]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|mimes:ico,png|max:1024',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string',
            'contact_address' => 'required|string|max:500',
            'contact_timings' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
            'meta_keywords' => 'required|string|max:500',
        ]);


        try {

            $setting = Setting::first();
            $imageHandler = new ImageHandler('logo');

            $data = $request->except(['logo', 'footer_logo', 'favicon']);

            if ($request->hasFile('logo')) {

                if (isset($setting->logo)) {
                    $imageHandler->delete($setting->logo);
                }
                $data['logo'] = $imageHandler->upload($request->file('logo'));
            }

            if ($request->hasFile('footer_logo')) {

                if (isset($setting->footer_logo)) {
                    $imageHandler->delete($setting->footer_logo);
                }
                $data['footer_logo'] = $imageHandler->upload($request->file('footer_logo'));
            }

            if ($request->hasFile('favicon')) {

                if (isset($setting->favicon)) {
                    $imageHandler->delete($setting->favicon);
                }
                $data['favicon'] = $imageHandler->upload($request->file('favicon'));
            }

            $setting->update($data);
            Toastr::success(__('messages.success.default'));
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}
