<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::orderBy('sort_order')->get();

        return view('admin.core-value.index', compact('coreValues'));
    }

    public function create()
    {
        return view('admin.core-value.form', ['coreValue' => new CoreValue()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'       => 'required|string|max:50',
            'title'      => 'required|string|max:100',
            'text'       => 'required|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        try {
            CoreValue::create($request->only(['icon', 'title', 'text', 'sort_order']));
            Toastr::success(__('messages.success.created', ['item' => 'Core Value']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.core-value.index');
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core-value.form', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'icon'       => 'required|string|max:50',
            'title'      => 'required|string|max:100',
            'text'       => 'required|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        try {
            $coreValue->update($request->only(['icon', 'title', 'text', 'sort_order']));
            Toastr::success(__('messages.success.updated', ['item' => 'Core Value']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.core-value.index');
    }

    public function destroy(CoreValue $coreValue)
    {
        try {
            $coreValue->delete();
            Toastr::success(__('messages.success.deleted', ['item' => 'Core Value']));
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
        }

        return redirect()->route('admin.core-value.index');
    }
}
