<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeStat;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class HomeStatController extends Controller
{
    public function index()
    {
        $stats = HomeStat::orderBy('sort_order')->get();

        return view('admin.home-stat.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.home-stat.form', ['stat' => new HomeStat()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'value'      => 'required|integer|min:0',
            'suffix'     => 'nullable|string|max:10',
            'label'      => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        try {
            HomeStat::create($request->only(['value', 'suffix', 'label', 'sort_order']));
            Toastr::success(__('messages.success.created', ['item' => 'Stat']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.home-stat.index');
    }

    public function edit(HomeStat $homeStat)
    {
        return view('admin.home-stat.form', ['stat' => $homeStat]);
    }

    public function update(Request $request, HomeStat $homeStat)
    {
        $request->validate([
            'value'      => 'required|integer|min:0',
            'suffix'     => 'nullable|string|max:10',
            'label'      => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        try {
            $homeStat->update($request->only(['value', 'suffix', 'label', 'sort_order']));
            Toastr::success(__('messages.success.updated', ['item' => 'Stat']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.home-stat.index');
    }

    public function destroy(HomeStat $homeStat)
    {
        try {
            $homeStat->delete();
            Toastr::success(__('messages.success.deleted', ['item' => 'Stat']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.home-stat.index');
    }
}
