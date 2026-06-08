{{-- Show a single mandatory disclosure --}}
<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => $disclosure->name,
        'breadcrumb' => [
            ['label' => 'Mandatory Disclosure', 'url' => route('disclosure.index')],
            ['label' => $disclosure->name],
        ],
    ])

    <section class="blog-with-sidebar-section disclosure-page" style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1 disclosure-heading" style="margin-bottom: 1.5rem;">
                <span>Mandatory Disclosure</span>
                <h2>{{ $disclosure->name }}</h2>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-lg-8">

                    @if ($disclosure->description)
                        <div class="disclosure-description">
                            <h5>Description</h5>
                            <p>{{ $disclosure->description }}</p>
                        </div>
                    @endif

                    @if ($disclosure->document)
                        <div class="disclosure-document-wrap">

                            @if ($disclosure->is_pdf)
                                <div id="pdf-toolbar" class="pdf-toolbar">
                                    <button id="pdf-prev" class="btn btn-sm btn-outline-secondary"
                                        title="Previous Page">
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
                                </div>

                                <div id="pdf-viewer" class="pdf-viewer-container">
                                    <div class="text-center py-5">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading PDF...</span>
                                        </div>
                                        <p class="mt-2 text-muted">Loading PDF preview...</p>
                                    </div>
                                </div>
                            @else
                                <div class="non-pdf-preview text-center">
                                    <i class="fa fa-file-o"></i>
                                    <p>Preview is not available for this file format.</p>
                                    <a href="{{ $disclosure->document_url }}" target="_blank"
                                        class="btn btn-outline-primary">
                                        Open Document
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif


                    <div class="disclosure-bottom-actions">
                        <a href="{{ route('disclosure.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left me-1"></i> Back to All Disclosures
                        </a>

                        @if ($disclosure->document)
                            <a href="{{ $disclosure->document_url }}" target="_blank"
                                class="btn btn-primary disclosure-download-btn">
                                <i class="fa fa-download me-1"></i> Download Document
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card disclosure-table-card border-0">
                        <div class="card-header">
                            <h5 class="mb-0">Public Documents</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0 disclosure-table">
                                    <tbody>
                                        @forelse ($disclosures as $document)
                                            <tr class="{{ $document->id === $disclosure->id ? 'current-row' : '' }}">
                                                <td>
                                                    <a href="{{ route('disclosure.show', $document->slug) }}"
                                                        class="disclosure-link">
                                                        {{ $document->name }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center py-4 text-muted">
                                                    No public documents available.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('pageStyles')
        <style>
            .disclosure-page {
                background: linear-gradient(180deg, #f7fafc 0%, #ffffff 30%, #ffffff 100%);
            }

            .disclosure-heading h2 {
                font-weight: 700;
                margin-bottom: 6px;
            }

            .disclosure-main-card,
            .disclosure-table-card {
                border-radius: 14px;
                box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
                overflow: hidden;
            }

            .disclosure-meta-row {
                margin-bottom: 18px;
            }

            .disclosure-meta-item {
                font-size: 13px;
                color: #475569;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 999px;
                padding: 8px 14px;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .disclosure-description {
                margin-bottom: 22px;
                padding: 18px;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                background: #fcfdff;
            }

            .disclosure-description h5 {
                font-size: 17px;
                margin-bottom: 10px;
                color: #1e293b;
            }

            .disclosure-description p {
                margin: 0;
                color: #475569;
                line-height: 1.8;
            }

            .disclosure-document-wrap h5 {
                color: #1e293b;
                font-weight: 700;
            }

            .disclosure-download-btn {
                font-weight: 600;
                border-radius: 8px;
            }

            .disclosure-bottom-actions {
                margin-top: 28px;
                padding-top: 18px;
                border-top: 1px solid #e2e8f0;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 10px;
            }

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

            .non-pdf-preview {
                border: 1px dashed #cbd5e1;
                background: #f8fafc;
                border-radius: 12px;
                padding: 44px 20px;
            }

            .non-pdf-preview i {
                font-size: 38px;
                color: #64748b;
                margin-bottom: 12px;
            }

            .non-pdf-preview p {
                margin-bottom: 14px;
                color: #475569;
            }

            .disclosure-table-card .card-header {
                background: transparent;
                color: #1e293b;
                border-bottom: 1px solid #e2e8f0;
                padding: 14px 16px;
            }

            .disclosure-table thead th {
                font-size: 12px;
                letter-spacing: 0.4px;
                text-transform: uppercase;
                color: #64748b;
                background: #f8fafc;
                border-bottom: 1px solid #e2e8f0;
            }

            .disclosure-table td,
            .disclosure-table th {
                padding: 12px 14px;
                vertical-align: middle;
            }

            .disclosure-link {
                color: #1e293b;
                text-decoration: none;
                font-weight: 600;
            }

            .disclosure-link:hover {
                color: var(--theme-main);
            }

            @media (max-width: 991.98px) {
                .pdf-viewer-container {
                    min-height: 430px;
                    max-height: 540px;
                }

                .pdf-toolbar {
                    flex-wrap: wrap;
                }

                .disclosure-bottom-actions {
                    margin-top: 22px;
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

                const pdfUrl = '{{ $disclosure->document_url }}';

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
