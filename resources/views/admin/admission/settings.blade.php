<x-app-layout pageTitle="Admission Settings" :breadcrumbs="[['label' => 'Admission Settings', 'url' => null]]">

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Admission Settings</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.admission.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3">Admission Status</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input @error('is_open') is-invalid @enderror"
                                            type="checkbox" role="switch" id="is_open" name="is_open" value="1"
                                            {{ old('is_open', $admissionSetting->is_open) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_open">
                                            Admissions Open
                                        </label>
                                        @error('is_open')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="academic_year" text="Academic Year" />
                                    <x-input-field name="academic_year" type="text"
                                        value="{{ old('academic_year', $admissionSetting->academic_year) }}"
                                        placeholder="e.g. 2026-2027" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="mb-3">Admission Dates</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="start_date" text="Start Date" />
                                    <x-input-field name="start_date" type="date"
                                        value="{{ old('start_date', optional($admissionSetting->start_date)->format('Y-m-d')) }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="end_date" text="End Date" />
                                    <x-input-field name="end_date" type="date"
                                        value="{{ old('end_date', optional($admissionSetting->end_date)->format('Y-m-d')) }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="mb-3">Contact Information</h4>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="contact_person" text="Contact Person" />
                                    <x-input-field name="contact_person" type="text"
                                        value="{{ old('contact_person', $admissionSetting->contact_person) }}"
                                        placeholder="e.g. Mr. Sharma" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-input-label name="contact_phone" text="Contact Phone" />
                                    <x-input-field name="contact_phone" type="text"
                                        value="{{ old('contact_phone', $admissionSetting->contact_phone) }}"
                                        placeholder="e.g. +91 98765 43210" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <x-input-label name="contact_email" text="Contact Email" />
                                    <x-input-field name="contact_email" type="email"
                                        value="{{ old('contact_email', $admissionSetting->contact_email) }}"
                                        placeholder="e.g. admissions@school.com" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="mb-3">Instructions</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="instructions" class="form-label">Admission Instructions</label>
                                    <textarea class="form-control @error('instructions') is-invalid @enderror" id="instructions" name="instructions"
                                        rows="5" placeholder="Enter admission instructions, required documents list, etc.">{{ old('instructions', $admissionSetting->instructions) }}</textarea>
                                    @error('instructions')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i data-lucide="save" class="me-1"></i> Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted mb-3">
                        <i data-lucide="info" class="me-1"></i> Information
                    </h5>
                    <ul class="list-unstyled mb-0 text-muted small">
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Toggle <strong>Admissions Open</strong> to enable/disable the enquiry form on the website.
                        </li>
                        <li class="mb-2">
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Set <strong>Start</strong> and <strong>End</strong> dates to show admission timeline.
                        </li>
                        <li>
                            <i data-lucide="check-circle" class="text-success me-1"></i>
                            Contact info appears on the enquiry page.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
