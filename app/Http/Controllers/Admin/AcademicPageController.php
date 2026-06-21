<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\PageService;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class AcademicPageController extends Controller
{
    protected PageService $pageService;

    /**
     * Slugs that belong to the Academics section.
     */
    protected const ACADEMIC_SLUGS = [
        'curriculum',
        'examination-policy',
        'school-timing',
        'rules-regulations',
        'uniform-regulations',
        'book-list',
        'fee-structure',
    ];

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    // ── Listing ────────────────────────────────────────────────────

    /**
     * List all Academics pages.
     */
    public function index()
    {
        $pages = Page::whereIn('slug', self::ACADEMIC_SLUGS)
            ->orderByRaw("FIELD(slug, '" . implode("','", self::ACADEMIC_SLUGS) . "')")
            ->get();

        return view('admin.pages.academics.index', [
            'pageTitle'   => 'Academics Pages',
            'breadcrumbs' => [
                ['label' => 'Academics', 'url' => null],
            ],
            'pages' => $pages,
        ]);
    }

    // ── Edit ───────────────────────────────────────────────────────

    /**
     * Show the form for editing a specific Academics page.
     */
    public function edit(Page $page)
    {
        $this->ensureAcademic($page);

        return view('admin.pages.academics.edit', [
            'pageTitle'   => 'Edit — ' . $page->name,
            'breadcrumbs' => [
                ['label' => 'Academics', 'url' => route('admin.academics.pages.index')],
                ['label' => $page->name, 'url' => null],
            ],
            'page' => $page,
        ]);
    }

    // ── Update ─────────────────────────────────────────────────────

    /**
     * Update the specified Academics page.
     */
    public function update(Request $request, Page $page)
    {
        $this->ensureAcademic($page);

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
     * Ensure the given page belongs to the Academics section.
     */
    protected function ensureAcademic(Page $page): void
    {
        if (! in_array($page->slug, self::ACADEMIC_SLUGS, true)) {
            abort(404);
        }
    }
}
