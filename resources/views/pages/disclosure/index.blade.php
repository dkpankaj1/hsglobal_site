{{-- List all public mandatory disclosures --}}
<x-web-layout>

    @include('layouts._web.page-header', [
        'title' => 'Mandatory Disclosure',
        'breadcrumb' => [['label' => 'Mandatory Disclosure']],
    ])

    <section style="padding:50px 0;">
        <div class="container">
            <div class="section-title-s1">
                <span>Mandatory Disclosure</span>
                <h2>Public Documents</h2>
            </div>
            <div class="table-responsive" style="margin-top:30px;">
                <table class="table table-bordered table-hover">
                    <thead style="background-color:var(--main-color); color:#000;">
                        <tr>
                            <th>SN.</th>
                            <th>Document</th>
                            <th>Download</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($disclosures as $key=>$disclosure)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $disclosure->name }}</td>
                                <td class="text-center">
                                    @if ($disclosure->document)
                                        <a href="{{ $disclosure->document_url }}" target="_blank"
                                            class="btn btn-sm btn-success">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('disclosure.show', $disclosure->slug) }}"
                                        class="btn btn-sm btn-primary">
                                        View Details <i class="fa fa-arrow-right ms-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <p class="text-muted">No public disclosures available at this time.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </section>

</x-web-layout>
