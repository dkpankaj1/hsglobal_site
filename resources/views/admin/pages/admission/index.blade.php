<x-app-layout pageTitle="{{ $pageTitle }}" :breadcrumbs="$breadcrumbs">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Page Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Updated</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pages as $page)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $page->name }}</td>
                                        <td><code>{{ $page->slug }}</code></td>
                                        <td>
                                            @if ($page->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                        </td>
                                        <td>{{ $page->updated_at->format('d M, Y') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.admission.pages.edit', $page) }}"
                                                class="btn btn-sm btn-primary">
                                                <i data-lucide="pencil" class="me-1"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            No Admission pages found. Run <code>php artisan db:seed
                                                --class=PageSeeder</code>
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

</x-app-layout>
