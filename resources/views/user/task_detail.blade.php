<x-user-layout>
    <div class="container-fluid py-4">
        <a href="{{ route('user.task') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Back to Project List
        </a>

        <div class="card">
            <div class="card-header">
                <h4>Project Detail</h4>
            </div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <strong>Name:</strong>
                    <p>{{ $project->name }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Status:</strong>
                    <span
                        class="badge bg-gradient-{{ $project->status ? 'success' : 'secondary' }}">{{ $project->status ?? 'N/A' }}</span>
                </div>

                <div class="col-md-12 mb-3">
                    <strong>Description:</strong>
                    <p>{{ $project->description }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Start Date:</strong>
                    <p>{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>End Date:</strong>
                    <p>{{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}</p>
                </div>

                <div class="col-md-12 mb-3">
                    <strong>Image:</strong><br>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="img-fluid"
                        width="300">
                </div>

                <div class="col-md-6">
                    <strong>Peserta:</strong>
                    <p>{{ $project->user?->name ?? 'Unknown' }} </p>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>