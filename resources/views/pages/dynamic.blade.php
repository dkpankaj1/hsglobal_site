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

            {{-- Page Image --}}
            @if ($page->image)
                <div
                    style="margin-bottom:28px; border-radius:12px; overflow:hidden; box-shadow:0 4px 16px rgba(15,23,42,0.1);">
                    <img src="{{ $page->image_url }}" alt="{{ $page->name }}"
                        style="width:100%; max-height:420px; object-fit:cover; display:block;">
                </div>
            @endif

            <div class="page-content" style="font-size:15px; color:#555; line-height:1.85;">
                {!! $page->content !!}
            </div>

            {{-- Attached File --}}
            @if ($page->file)
                @if ($page->is_pdf)
                    <div style="margin-top:30px;">
                        <h5 style="margin-bottom:12px; color:#1e293b; font-weight:700;">Attachment</h5>
                        <div id="pdf-toolbar" class="pdf-toolbar">
                            <button id="pdf-prev" class="btn btn-sm btn-outline-secondary" title="Previous Page">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <span class="pdf-page-info">
                                Page <span id="pdf-current-page">1</span> of <span id="pdf-total-pages">-</span>
                            </span>
                            <button id="pdf-next" class="btn btn-sm btn-outline-secondary" title="Next Page">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                            <span class="pdf-separator"></span>
                            <button id="pdf-zoom-out" class="btn btn-sm btn-outline-secondary" title="Zoom Out">
                                <i class="fa fa-search-minus"></i>
                            </button>
                            <span id="pdf-zoom-level" class="pdf-zoom-info">100%</span>
                            <button id="pdf-zoom-in" class="btn btn-sm btn-outline-secondary" title="Zoom In">
                                <i class="fa fa-search-plus"></i>
                            </button>
                            <span class="pdf-separator"></span>
                            <a href="{{ $page->file_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-download me-1"></i> Download
                            </a>
                        </div>
                        <div id="pdf-viewer" class="pdf-viewer-container">
                            <div class="text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading PDF...</span>
                                </div>
                                <p class="mt-2 text-muted">Loading PDF preview...</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div
                        style="margin-top:30px; padding:16px 20px; background:#f4f8ff; border-left:4px solid var(--theme-main); border-radius:6px;">
                        <i class="fa fa-download" style="color:var(--theme-main); margin-right:8px;"></i>
                        <strong>Attachment:</strong>
                        <a href="{{ $page->file_url }}" target="_blank" style="margin-left:6px;">
                            {{ $page->file_name }}
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </section>

    @push('pageStyles')
        <style>
            .pdf-toolbar {
                display: flex;
                align-items: center;
                gap: 6px;
                padding: 10px 12px;
                background: #f8fafc;
                border: 1px solid #dbe2ea;
                border-bottom: none;
                border-radius: 10px 10px 0 0;
            }

            .pdf-page-info {
                font-size: 13px;
                color: #334155;
                min-width: 100px;
                text-align: center;
            }

            .pdf-separator {
                width: 1px;
                height: 20px;
                background: #dbe2ea;
                margin: 0 6px;
            }

            .pdf-zoom-info {
                font-size: 13px;
                color: #334155;
                min-width: 40px;
                text-align: center;
            }

            .pdf-toolbar button:disabled {
                opacity: 0.4;
                pointer-events: none;
            }

            .pdf-viewer-container {
                min-height: 600px;
                max-height: 750px;
                overflow-y: auto;
                border: 1px solid #dbe2ea;
                border-top: none;
                background: #f1f5f9;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                padding: 14px;
            }

            .pdf-viewer-container canvas {
                box-shadow: 0 8px 24px rgba(15, 23, 42, 0.15);
                border-radius: 6px;
            }

            @media (max-width: 991.98px) {
                .pdf-viewer-container {
                    min-height: 430px;
                    max-height: 540px;
                }

                .pdf-toolbar {
                    flex-wrap: wrap;
                }
            }
        </style>
    @endpush

    @push('pageScripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        <script>
            (function() {
                const container = document.getElementById('pdf-viewer');
                if (!container) return;

                const btnPrev = document.getElementById('pdf-prev');
                const btnNext = document.getElementById('pdf-next');
                const btnZoomIn = document.getElementById('pdf-zoom-in');
                const btnZoomOut = document.getElementById('pdf-zoom-out');
                const lblCurrent = document.getElementById('pdf-current-page');
                const lblTotal = document.getElementById('pdf-total-pages');
                const lblZoom = document.getElementById('pdf-zoom-level');

                let pdfDoc = null;
                let currentPage = 1;
                let totalPages = 0;
                let scale = 1.0;
                const SCALE_STEP = 0.1;
                const MIN_SCALE = 0.5;
                const MAX_SCALE = 2.5;

                pdfjsLib.GlobalWorkerOptions.workerSrc =
                    'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

                const pdfUrl = '{{ $page->file_url }}';

                function renderPage(pageNum) {
                    container.innerHTML = '';

                    pdfDoc.getPage(pageNum).then(function(page) {
                        const viewport = page.getViewport({
                            scale: scale
                        });
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');

                        canvas.width = viewport.width;
                        canvas.height = viewport.height;
                        canvas.style.maxWidth = '100%';
                        canvas.style.height = 'auto';

                        container.appendChild(canvas);

                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });

                        lblCurrent.textContent = pageNum;
                        updateButtons();
                    });
                }

                function updateButtons() {
                    btnPrev.disabled = currentPage <= 1;
                    btnNext.disabled = currentPage >= totalPages;
                    lblZoom.textContent = Math.round(scale * 100) + '%';
                }

                function goToPage(num) {
                    if (num < 1 || num > totalPages) return;
                    currentPage = num;
                    renderPage(currentPage);
                }

                function changeZoom(delta) {
                    const newScale = Math.min(MAX_SCALE, Math.max(MIN_SCALE, scale + delta));
                    if (newScale === scale) return;
                    scale = newScale;
                    renderPage(currentPage);
                }

                btnPrev.addEventListener('click', function() {
                    goToPage(currentPage - 1);
                });
                btnNext.addEventListener('click', function() {
                    goToPage(currentPage + 1);
                });
                btnZoomIn.addEventListener('click', function() {
                    changeZoom(SCALE_STEP);
                });
                btnZoomOut.addEventListener('click', function() {
                    changeZoom(-SCALE_STEP);
                });

                document.addEventListener('keydown', function(e) {
                    if (!pdfDoc) return;
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        goToPage(currentPage - 1);
                    }
                    if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        goToPage(currentPage + 1);
                    }
                });

                pdfjsLib.getDocument(pdfUrl).promise
                    .then(function(pdf) {
                        pdfDoc = pdf;
                        totalPages = pdf.numPages;
                        lblTotal.textContent = totalPages;

                        renderPage(1);
                    })
                    .catch(function() {
                        container.innerHTML = `
                            <div class="text-center py-5">
                                <p class="text-danger">Failed to load PDF.</p>
                                <a href="${pdfUrl}" target="_blank" class="btn btn-primary">
                                    <i class="fa fa-download me-1"></i> Download Instead
                                </a>
                            </div>`;
                        const toolbar = document.getElementById('pdf-toolbar');
                        if (toolbar) {
                            toolbar.style.display = 'none';
                        }
                    });
            })();
        </script>
    @endpush

</x-web-layout>
