<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\PageService;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class AdmissionPageController extends Controller
{
    protected PageService $pageService;

    /**
     * Slugs that belong to the Admission section.
     */
    protected const ADMISSION_SLUGS = [
        'admission-procedure',
        'eligibility-criteria',
        'documents-required',
        'fee-payment-rules',
        'withdrawal-transfer',
        'tc-sample',
    ];

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    // ── Listing ────────────────────────────────────────────────────

    /**
     * List all Admission pages.
     */
    public function index()
    {
        $pages = Page::whereIn('slug', self::ADMISSION_SLUGS)
            ->orderByRaw("FIELD(slug, '" . implode("','", self::ADMISSION_SLUGS) . "')")
            ->get();

        return view('admin.pages.admission.index', [
            'pageTitle'   => 'Admission Pages',
            'breadcrumbs' => [
                ['label' => 'Admission', 'url' => null],
            ],
            'pages' => $pages,
        ]);
    }

    // ── Edit ───────────────────────────────────────────────────────

    /**
     * Show the form for editing a specific Admission page.
     */
    public function edit(Page $page)
    {
        $this->ensureAdmission($page);

        return view('admin.pages.admission.edit', [
            'pageTitle'   => 'Edit — ' . $page->name,
            'breadcrumbs' => [
                ['label' => 'Admission', 'url' => route('admin.admission.pages.index')],
                ['label' => $page->name, 'url' => null],
            ],
            'page' => $page,
        ]);
    }

    // ── Update ─────────────────────────────────────────────────────

    /**
     * Update the specified Admission page.
     */
    public function update(Request $request, Page $page)
    {
        $this->ensureAdmission($page);

        $request->validate([
            'name'             => 'required|string|max:255',
            'content'          => 'nullable|string',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords'    => 'nullable|string|max:500',
            'is_published'     => 'boolean',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'file'             => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
            'delete_image'     => 'boolean',
            'delete_file'      => 'boolean',
        ]);

        try {
            $data = $request->only([
                'name',
                'content',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'is_published',
            ]);

            $data['image']        = $request->file('image');
            $data['file']         = $request->file('file');
            $data['delete_image'] = $request->boolean('delete_image');
            $data['delete_file']  = $request->boolean('delete_file');

            $this->pageService->update($page, $data);

            Toastr::success(__('messages.success.updated', ['item' => $page->name]));
            return redirect()->back();
        } catch (Exception) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    // ── Helpers ────────────────────────────────────────────────────

    /**
     * Ensure the given page belongs to the Admission section.
     */
    protected function ensureAdmission(Page $page): void
    {
        if (! in_array($page->slug, self::ADMISSION_SLUGS, true)) {
            abort(404);
        }
    }
}
