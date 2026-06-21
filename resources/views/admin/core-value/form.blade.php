<x-app-layout pageTitle="{{ $coreValue->exists ? 'Edit Core Value' : 'Add Core Value' }}" :breadcrumbs="[
    ['label' => 'Core Values', 'url' => route('admin.core-value.index')],
    ['label' => $coreValue->exists ? 'Edit' : 'Add', 'url' => null],
]">

    <div class="card">
        <div class="card-body">
            <form
                action="{{ $coreValue->exists ? route('admin.core-value.update', $coreValue) : route('admin.core-value.store') }}"
                method="post">
                @csrf
                @if ($coreValue->exists)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-input-label name="icon" text="Icon (Font Awesome class)" />
                            <x-input-field name="icon" type="text" value="{{ old('icon', $coreValue->icon) }}"
                                placeholder="e.g. fa-star, fa-heart" />
                            <small class="text-muted">Use any Font Awesome class like <code>fa-star</code>,
                                <code>fa-heart</code>, <code>fa-leaf</code></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-input-label name="sort_order" text="Sort Order" />
                            <x-input-field name="sort_order" type="number"
                                value="{{ old('sort_order', $coreValue->sort_order ?? 0) }}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <x-input-label name="title" text="Title" />
                            <x-input-field name="title" type="text" value="{{ old('title', $coreValue->title) }}"
                                placeholder="e.g. Excellence" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="text" class="form-label">Description</label>
                            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3"
                                required>{{ old('text', $coreValue->text) }}</textarea>
                            @error('text')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        {{ $coreValue->exists ? 'Update' : 'Create' }} Core Value
                    </button>
                    <a href="{{ route('admin.core-value.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
