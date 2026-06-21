<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => $page->name,
        'breadcrumb' => [['label' => $section, 'url' => $sectionUrl], ['label' => $page->name]],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>{{ $section }}</span>
                <h2>{{ $page->name }}</h2>
            </div>

            <div class="page-content" style="font-size:15px; color:#555; line-height:1.85;">
                {!! $page->content !!}
            </div>

            {{-- Attached File --}}
            @if ($page->file)
                <div
                    style="margin-top:30px; padding:16px 20px; background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px;">
                    <i class="fa fa-download" style="color:var(--theme-main); margin-right:8px;"></i>
                    <strong>Attachment:</strong>
                    <a href="{{ $page->file_url }}" target="_blank" style="margin-left:6px;">
                        {{ $page->file_name }}
                    </a>
                </div>
            @endif
        </div>
    </section>

</x-web-layout>
