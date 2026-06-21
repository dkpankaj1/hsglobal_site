<x-app-layout pageTitle="About Settings" :breadcrumbs="[['label' => 'About Settings', 'url' => null]]">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.about-setting.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- School Info --}}
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3">School Information</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-input-label name="school_name" text="School Name" />
                            <x-input-field name="school_name" type="text"
                                value="{{ old('school_name', $aboutSetting->school_name) }}"
                                placeholder="Enter school name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-input-label name="established_year" text="Established Year" />
                            <x-input-field name="established_year" type="text"
                                value="{{ old('established_year', $aboutSetting->established_year) }}"
                                placeholder="e.g. 2019" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <x-input-label name="affiliation" text="Affiliation" />
                            <x-input-field name="affiliation" type="text"
                                value="{{ old('affiliation', $aboutSetting->affiliation) }}" placeholder="e.g. CBSE" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <x-input-label name="affiliation_no" text="Affiliation No." />
                            <x-input-field name="affiliation_no" type="text"
                                value="{{ old('affiliation_no', $aboutSetting->affiliation_no) }}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <x-input-label name="school_no" text="School No." />
                            <x-input-field name="school_no" type="text"
                                value="{{ old('school_no', $aboutSetting->school_no) }}" />
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="mb-3">Descriptions</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" required>{{ old('description', $aboutSetting->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="long_description" class="form-label">Long Description (Our Story)</label>
                            <textarea class="form-control @error('long_description') is-invalid @enderror" id="long_description"
                                name="long_description" rows="5">{{ old('long_description', $aboutSetting->long_description) }}</textarea>
                            @error('long_description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- About Image --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="mb-3">About Page Image</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="form-control d-flex justify-content-center align-items-center my-1"
                                style="height:120px;">
                                <img src="{{ $aboutSetting->about_image_url }}" alt="About Image"
                                    style="max-height:100px;">
                            </div>
                            <input type="file" class="form-control mt-2" name="about_image" accept="image/*">
                            @error('about_image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Highlights --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="mb-3">Highlights</h4>
                        <p class="text-muted small">Add highlight points shown on the About School page.</p>
                    </div>
                    <div class="col-md-12">
                        <div id="highlights-container">
                            @foreach (old('highlights', $aboutSetting->highlights ?? []) as $index => $highlight)
                                <div class="input-group mb-2 highlight-row">
                                    <input type="text" name="highlights[]" class="form-control"
                                        value="{{ $highlight }}" placeholder="Enter highlight text">
                                    <button type="button" class="btn btn-outline-danger remove-row">
                                        <i data-lucide="x"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-1" id="add-highlight">
                            <i data-lucide="plus" class="me-1"></i> Add Highlight
                        </button>
                    </div>
                </div>

                {{-- Achievements --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <h4 class="mb-3">Achievements</h4>
                        <p class="text-muted small">Manage achievements shown on the website.</p>
                    </div>
                    <div class="col-md-12">
                        <div id="achievements-container">
                            @foreach (old('achievements', $aboutSetting->achievements ?? []) as $index => $achievement)
                                <div class="card mb-2 achievement-row">
                                    <div class="card-body p-2">
                                        <div class="row g-2">
                                            <div class="col-md-2">
                                                <input type="text" name="achievements[{{ $index }}][icon]"
                                                    class="form-control form-control-sm" placeholder="fa-trophy"
                                                    value="{{ $achievement['icon'] ?? '' }}">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="achievements[{{ $index }}][title]"
                                                    class="form-control form-control-sm" placeholder="Title"
                                                    value="{{ $achievement['title'] ?? '' }}">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="achievements[{{ $index }}][desc]"
                                                    class="form-control form-control-sm" placeholder="Description"
                                                    value="{{ $achievement['desc'] ?? '' }}">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="achievements[{{ $index }}][year]"
                                                    class="form-control form-control-sm" placeholder="Year"
                                                    value="{{ $achievement['year'] ?? '' }}">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger remove-row">
                                                    <i data-lucide="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-1" id="add-achievement">
                            <i data-lucide="plus" class="me-1"></i> Add Achievement
                        </button>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update About Settings</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            // Highlights
            let highlightIndex = {{ count(old('highlights', $aboutSetting->highlights ?? [])) }};
            document.getElementById('add-highlight').addEventListener('click', function() {
                const container = document.getElementById('highlights-container');
                const row = document.createElement('div');
                row.className = 'input-group mb-2 highlight-row';
                row.innerHTML = `
                <input type="text" name="highlights[]" class="form-control" placeholder="Enter highlight text">
                <button type="button" class="btn btn-outline-danger remove-row"><i data-lucide="x"></i></button>`;
                container.appendChild(row);
                lucide.createIcons();
                highlightIndex++;
            });

            // Achievements
            let achievementIndex = {{ count(old('achievements', $aboutSetting->achievements ?? [])) }};
            document.getElementById('add-achievement').addEventListener('click', function() {
                const container = document.getElementById('achievements-container');
                const row = document.createElement('div');
                row.className = 'card mb-2 achievement-row';
                row.innerHTML = `
                <div class="card-body p-2">
                    <div class="row g-2">
                        <div class="col-md-2">
                            <input type="text" name="achievements[${achievementIndex}][icon]"
                                class="form-control form-control-sm" placeholder="fa-trophy">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="achievements[${achievementIndex}][title]"
                                class="form-control form-control-sm" placeholder="Title">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="achievements[${achievementIndex}][desc]"
                                class="form-control form-control-sm" placeholder="Description">
                        </div>
                        <div class="col-md-1">
                            <input type="text" name="achievements[${achievementIndex}][year]"
                                class="form-control form-control-sm" placeholder="Year">
                        </div>
                        <div class="col-md-1 d-flex align-items-center">
                            <button type="button" class="btn btn-sm btn-outline-danger remove-row">
                                <i data-lucide="x"></i></button>
                        </div>
                    </div>
                </div>`;
                container.appendChild(row);
                lucide.createIcons();
                achievementIndex++;
            });

            // Remove row (delegated)
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-row')) {
                    e.target.closest('.highlight-row, .achievement-row').remove();
                }
            });
        </script>
    @endpush

</x-app-layout>
