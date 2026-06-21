<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolAuthority;
use App\Support\ImageHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class SchoolAuthorityController extends Controller
{
    // ─── Chairman ────────────────────────────────────────────────

    public function chairman()
    {
        $authority = SchoolAuthority::where('role', 'chairman')->first();

        return view('admin.authority.chairman', compact('authority'));
    }

    public function chairmanUpdate(Request $request)
    {
        $authority = SchoolAuthority::where('role', 'chairman')->firstOrFail();

        $request->validate([
            'name'              => 'required|string|max:100',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'message'           => 'nullable|string|max:5000',
            'short_description' => 'nullable|string|max:300',
            'is_published'      => 'boolean',
        ]);

        try {
            $imageHandler = new ImageHandler('authorities');
            $data = $request->only(['name', 'message', 'short_description']);
            $data['is_published'] = $request->boolean('is_published');

            if ($request->hasFile('photo')) {
                if ($authority->photo) {
                    $imageHandler->delete($authority->photo);
                }
                $data['photo'] = $imageHandler->upload($request->file('photo'), width: 400, height: 400);
            }

            $authority->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Chairman']));
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    // ─── Director ────────────────────────────────────────────────

    public function director()
    {
        $authority = SchoolAuthority::where('role', 'director')->first();

        return view('admin.authority.director', compact('authority'));
    }

    public function directorUpdate(Request $request)
    {
        $authority = SchoolAuthority::where('role', 'director')->firstOrFail();

        $request->validate([
            'name'              => 'required|string|max:100',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'message'           => 'nullable|string|max:5000',
            'short_description' => 'nullable|string|max:300',
            'is_published'      => 'boolean',
        ]);

        try {
            $imageHandler = new ImageHandler('authorities');
            $data = $request->only(['name', 'message', 'short_description']);
            $data['is_published'] = $request->boolean('is_published');

            if ($request->hasFile('photo')) {
                if ($authority->photo) {
                    $imageHandler->delete($authority->photo);
                }
                $data['photo'] = $imageHandler->upload($request->file('photo'), width: 400, height: 400);
            }

            $authority->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Director']));
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    // ─── Principal ───────────────────────────────────────────────

    public function principal()
    {
        $authority = SchoolAuthority::where('role', 'principal')->first();

        return view('admin.authority.principal', compact('authority'));
    }

    public function principalUpdate(Request $request)
    {
        $authority = SchoolAuthority::where('role', 'principal')->firstOrFail();

        $request->validate([
            'name'              => 'required|string|max:100',
            'photo'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'message'           => 'nullable|string|max:5000',
            'short_description' => 'nullable|string|max:300',
            'is_published'      => 'boolean',
        ]);

        try {
            $imageHandler = new ImageHandler('authorities');
            $data = $request->only(['name', 'message', 'short_description']);
            $data['is_published'] = $request->boolean('is_published');

            if ($request->hasFile('photo')) {
                if ($authority->photo) {
                    $imageHandler->delete($authority->photo);
                }
                $data['photo'] = $imageHandler->upload($request->file('photo'), width: 400, height: 400);
            }

            $authority->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Principal']));
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }
}
