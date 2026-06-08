<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoticeBoard;
use App\Support\DocumentHandler;
use App\Support\Toastr;
use Exception;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = NoticeBoard::latest()->paginate(15);
        return view('admin.notice-board.index', [
            'notices' => $notices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice-board.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'document'    => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'is_publish'  => 'boolean',
        ]);

        try {
            $documentHandler = new DocumentHandler('notice-boards');

            $data = $request->only(['title', 'description']);
            $data['is_publish'] = $request->boolean('is_publish');

            if ($request->hasFile('document')) {
                $data['document'] = $documentHandler->upload($request->file('document'));
            }

            NoticeBoard::create($data);

            Toastr::success(__('messages.success.created', ['item' => 'Notice Board']));
            return redirect()->route('admin.notice-board.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NoticeBoard $noticeBoard)
    {
        return view('admin.notice-board.show', [
            'notice' => $noticeBoard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoticeBoard $noticeBoard)
    {
        return view('admin.notice-board.edit', [
            'notice' => $noticeBoard
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NoticeBoard $noticeBoard)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'document'    => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'is_publish'  => 'boolean',
        ]);

        try {
            $documentHandler = new DocumentHandler('notice-boards');

            $data = $request->only(['title', 'description']);
            $data['is_publish'] = $request->boolean('is_publish');

            if ($request->hasFile('document')) {
                if ($noticeBoard->document) {
                    $documentHandler->delete($noticeBoard->document);
                }
                $data['document'] = $documentHandler->upload($request->file('document'));
            }

            $noticeBoard->update($data);

            Toastr::success(__('messages.success.updated', ['item' => 'Notice Board']));
            return redirect()->route('admin.notice-board.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoticeBoard $noticeBoard)
    {
        try {
            if ($noticeBoard->document) {
                $documentHandler = new DocumentHandler('notice-boards');
                $documentHandler->delete($noticeBoard->document);
            }

            $noticeBoard->delete();

            Toastr::success(__('messages.success.deleted', ['item' => 'Notice Board']));
            return redirect()->route('admin.notice-board.index');
        } catch (Exception $e) {
            Toastr::error(__('messages.error.default'));
            return redirect()->back();
        }
    }
}
