<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Internship Table</h6>
                        <a href="{{ route('internships.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Internship
                        </a>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Surat</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Institution</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Divisi</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Pelaksanaan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Kelengkapan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Contact</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($internships as $index => $internship)
                                        <tr>
                                            <td class="ps-3">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs mb-0">{{ \Carbon\Carbon::parse($internship->letter_date)->format('d M Y') }}</p>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $internship->institution_name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $internship->major }}</p>
                                            </td>

                                            <td class="text-center">
                                                <p class="text-xs mb-0">
                                                    {{ $internship->division?->name ?? '-' }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs mb-0">
                                                    {{ \Carbon\Carbon::parse($internship->start_date)->format('d M') }} -
                                                    {{ \Carbon\Carbon::parse($internship->end_date)->format('d M Y') }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge {{ $internship->documentation === 'Lengkap' ? 'bg-gradient-primary' : 'bg-gradient-secondary' }}">
                                                    {{ $internship->documentation }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs mb-0">{{ $internship->phone }}</p>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('intern.show', $internship->id) }}" title="View">
                                                        <i class="fas fa-eye "></i>
                                                    </a>
                                                    <a href="{{ route('intern.edit', $internship->id) }}" title="Edit">
                                                        <i class="fas fa-edit "></i>
                                                    </a>
                                                    <form action="{{ route('intern.destroy', $internship->id) }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-none border-0 bg-transparent p-0 m-0" title="Delete">
                                                            <i class="fas fa-trash "></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted py-4">No internship records found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
