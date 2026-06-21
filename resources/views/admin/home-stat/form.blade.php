<x-app-layout pageTitle="{{ $stat->exists ? 'Edit Stat' : 'Add Stat' }}" :breadcrumbs="[
    ['label' => 'Home Stats', 'url' => route('admin.home-stat.index')],
    ['label' => $stat->exists ? 'Edit' : 'Add', 'url' => null],
]">

    <div class="card">
        <div class="card-body">
            <form action="{{ $stat->exists ? route('admin.home-stat.update', $stat) : route('admin.home-stat.store') }}"
                method="post">
                @csrf
                @if ($stat->exists)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <x-input-label name="value" text="Number Value" />
                            <x-input-field name="value" type="number" value="{{ old('value', $stat->value) }}"
                                placeholder="e.g. 1000" />
                            <small class="text-muted">Just the number, without suffix.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <x-input-label name="suffix" text="Suffix" />
                            <x-input-field name="suffix" type="text" value="{{ old('suffix', $stat->suffix) }}"
                                placeholder="e.g. +, %, K" />
                            <small class="text-muted">Optional. E.g. <code>+</code>, <code>%</code>,
                                <code>K</code></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <x-input-label name="sort_order" text="Sort Order" />
                            <x-input-field name="sort_order" type="number"
                                value="{{ old('sort_order', $stat->sort_order ?? 0) }}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <x-input-label name="label" text="Label" />
                            <x-input-field name="label" type="text" value="{{ old('label', $stat->label) }}"
                                placeholder="e.g. Students, Qualified Teachers" />
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        {{ $stat->exists ? 'Update' : 'Create' }} Stat
                    </button>
                    <a href="{{ route('admin.home-stat.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
