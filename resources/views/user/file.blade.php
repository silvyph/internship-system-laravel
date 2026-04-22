<x-user-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>File Table</h6>
                        {{-- <a href="{{ route('files.create') }}" class="btn btn-primary mt-3 mb-3">
                            <i class="fas fa-upload"></i> Upload New File
                        </a> --}}
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $index => $file)
                                        <tr>
                                            <td class="ps-3">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $file->nama }}</h6>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-xs text-secondary badge text-white {{ $file->type == 'Sertifikat' ? 'bg-gradient-warning' : 'bg-gradient-success' }}">{{ $file->type }}</span>

                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ Str::limit($file->description, 60) }}
                                                </p>
                                            </td>
                                            <td class="d-flex gap-2">
                                                <a href="{{ route('files.download', $file) }}"
                                                    class="btn btn-sm btn-info text-white" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                {{-- <a href="{{ route('files.edit', $file) }}"
                                                    class="btn btn-sm btn-warning text-white" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a> --}}
                                                {{-- <form action="{{ route('files.destroy', $file) }}" method="POST"
                                                    onsubmit="return confirm('Delete file?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($files->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">No files found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-3 px-4">
                            {{ $files->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>