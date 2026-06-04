<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportantNotice;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class ImportantNoticeController extends Controller
{
    public function edit()
    {
        $importantNotice = ImportantNotice::firstOrCreate([]);
        return view('admin.important-notice.index', [
            'importantNotice' => $importantNotice
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'action' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'enabled' => 'boolean',
        ]);

        try {
            $importantNotice = ImportantNotice::firstOrCreate([]);
            $imageHandler = new ImageHandler('notice-banner');

            $data = $request->only(['heading', 'title', 'description', 'action', 'enabled']);
            $data['enabled'] = $request->boolean('enabled');

            if ($request->hasFile('banner')) {
                if ($importantNotice->banner) {
                    $imageHandler->delete($importantNotice->banner);
                }
                $data['banner'] = $imageHandler->upload($request->file('banner'));
            }

            $importantNotice->update($data);

            Toastr::success(__('messages.success.default'));
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back();
        }
    }
}
