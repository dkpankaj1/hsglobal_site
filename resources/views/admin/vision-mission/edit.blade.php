<x-app-layout pageTitle="Vision & Mission" :breadcrumbs="[['label' => 'Vision & Mission', 'url' => null]]">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.vision-mission.update') }}" method="post">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3">Vision & Mission</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="vision" class="form-label">Our Vision</label>
                            <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="4"
                                required>{{ old('vision', $visionMission->vision) }}</textarea>
                            @error('vision')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="mission" class="form-label">Our Mission</label>
                            <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" rows="4"
                                required>{{ old('mission', $visionMission->mission) }}</textarea>
                            @error('mission')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update Vision & Mission</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
