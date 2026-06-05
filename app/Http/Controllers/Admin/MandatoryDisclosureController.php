<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MandatoryDisclosure;
use App\Support\DocumentHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MandatoryDisclosureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disclosures = MandatoryDisclosure::latest()->paginate(15);
        return view('admin.mandatory-disclosure.index', [
            'disclosures' => $disclosures
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mandatory-disclosure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:mandatory_disclosures,name',
            'description' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf|max:5120',
            'is_public' => 'boolean',
        ]);

        try {
            $documentHandler = new DocumentHandler('mandatory-disclosures');

            $data = $request->only(['name', 'description', 'is_public']);
            $data['slug'] = Str::slug($request->name);
            $data['is_public'] = $request->boolean('is_public');

            if ($request->hasFile('document')) {
                $data['document'] = $documentHandler->upload($request->file('document'));
            }

            MandatoryDisclosure::create($data);

            Toastr::success(__('messages.success.created', ['item' => 'Mandatory Disclosure']));
            return redirect()->route('admin.mandatory-disclosure.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MandatoryDisclosure $mandatoryDisclosure)
    {
        return view('admin.mandatory-disclosure.show', [
            'disclosure' => $mandatoryDisclosure
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MandatoryDisclosure $mandatoryDisclosure)
    {
        return view('admin.mandatory-disclosure.edit', [
            'disclosure' => $mandatoryDisclosure
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MandatoryDisclosure $mandatoryDisclosure)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:mandatory_disclosures,name,' . $mandatoryDisclosure->id,
            'description' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:5120',
            'is_public' => 'boolean',
        ]);

        try {
            $documentHandler = new DocumentHandler('mandatory-disclosures');

            $data = $request->only(['name', 'description', 'is_public']);
            $data['slug'] = Str::slug($request->name);
            $data['is_public'] = $request->boolean('is_public');

            if ($request->hasFile('document')) {
                if ($mandatoryDisclosure->document) {
                    $documentHandler->delete($mandatoryDisclosure->document);
                }
                $data['document'] = $documentHandler->upload($request->file('document'));
            }

            $mandatoryDisclosure->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Mandatory Disclosure']));
            return redirect()->route('admin.mandatory-disclosure.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MandatoryDisclosure $mandatoryDisclosure)
    {
        try {
            if ($mandatoryDisclosure->document) {
                $documentHandler = new DocumentHandler('mandatory-disclosures');
                $documentHandler->delete($mandatoryDisclosure->document);
            }

            $mandatoryDisclosure->delete();

            Toastr::success(__('messages.success.deleted', ['item' => 'Mandatory Disclosure']));
            return redirect()->route('admin.mandatory-disclosure.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back();
        }
    }
}
