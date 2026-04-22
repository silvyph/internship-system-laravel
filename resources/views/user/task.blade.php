<x-user-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tugas Magang</h6>
                        {{-- <a href="{{ route('projects.create') }}" class="btn btn-primary mt-3 mb-3">
                            <i class="fas fa-plus"></i> Add New Project
                        </a> --}}
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Start - End</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Peserta</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $index => $project)
                                                                    <tr>
                                                                        <td>
                                                                            <p class="text-xs font-weight-bold mb-0 mx-3">{{ $index + 1 }}</p>
                                                                        </td>
                                                                        <td>
                                                                            <div class="d-flex flex-column justify-content-center">
                                                                                <h6 class="mb-0 text-sm">{{ $project->name }}</h6>
                                                                                <p class="text-xs text-secondary mb-0">
                                                                                    {{ Str::limit($project->description, 40) }}
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image"
                                                                                width="80">
                                                                        </td>
                                                                        <td>
                                                                            <span
                                                                                class="badge {{ 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    $project->status == 'Selesai' ? 'bg-gradient-primary' :
                                        ($project->status == 'Belum Selesai' ? 'bg-gradient-warning' :
                                            'bg-gradient-danger') 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }}">
                                                                                {{ $project->status ?? 'N/A' }}
                                                                            </span>

                                                                        </td>
                                                                        <td>
                                                                            <span class="text-secondary text-xs font-weight-bold">
                                                                                {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }} -
                                                                                {{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <p>{{ $project->user?->name ?? 'Unknown' }} </p>

                                                                        </td>
                                                                        <td class="d-flex justify-content-center align-items-center ">
                                                                            <a href="{{ route('user.task_detail', $project->id) }}" title="View">
                                                                                <i class="fas fa-eye btn-none text-info"></i>
                                                                            </a>

                                                                            {{-- <a href="{{ route('projects.edit', $project->id) }}" title="Edit">
                                                                                <i class="fas fa-edit btn-none"></i>
                                                                            </a>
                                                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                                                                onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn-none" title="Delete">
                                                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                                                </button>
                                                                            </form> --}}
                                                                        </td>
                                                                    </tr>
                                    @endforeach
                                    @if ($projects->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">No projects found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination (jika pakai paginate di controller) --}}
                        <div class="mt-3 px-4">
                            {{ $projects->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>