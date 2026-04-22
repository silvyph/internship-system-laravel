<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Internship Table</h6>
                        {{-- <a href="{{ route('intern.create') }}" class="btn btn-primary mt-3 mb-3">
                            <i class="fas fa-plus"></i> Add Internship
                        </a> --}}
                        @if (session('success'))
                            <div class="alert alert-primary text-white mt-2">{{ session('success') }}</div>
                        @endif
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Instansi
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Divisi
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            detail
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($intern as $index => $internship)
                                                                                                                                    <tr>
                                                                                                                                        <td class="ps-3">
                                                                                                                                            <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                            <h6 class="mb-0 text-sm">{{ $internship->name }}</h6>
                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                            <p class="text-xs text-secondary mb-0">{{ $internship->institution_name }}
                                                                                                                                            </p>
                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                            <p class="text-xs text-secondary mb-0">
                                                                                                                                                {{ $internship->division?->name ?? '-' }}
                                                                                                                                            </p>
                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                            <span
                                                                                                                                                class="badge text-white 
                                                                                                                                                                                                                                                                                                                                    {{ 
                                                                                                                                                                                                                                                                                        $internship->status === 'Mendaftar'
                                        ? 'bg-gradient-warning'
                                        : ($internship->status === 'Ditolak'
                                            ? 'bg-gradient-danger'
                                            : 'bg-gradient-success') 
                                                                                                                                                                                                                                                                                    }}">
                                                                                                                                                {{ $internship->status }}
                                                                                                                                            </span>
                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                           
                                                                                                                                                <a
                                                                                                                                                    href="{{ route('intern.show', $internship) }}" class="btn btn-sm btn-info text-white">Lihat Detail</a>
                                                                                                                                        </td>
                                                                                                                                        <td class="d-flex gap-2">
                                                                                                                                            <form
                                                                                                                                                action="{{ route('intern.updateStatus', ['intern' => $internship, 'status' => 'Diterima']) }}"
                                                                                                                                                method="POST">
                                                                                                                                                @csrf
                                                                                                                                                @method('PATCH')
                                                                                                                                                <button type="submit" class="btn btn-sm btn-success" title="Terima">
                                                                                                                                                    <i class="fas fa-check"></i> Terima
                                                                                                                                                </button>
                                                                                                                                            </form>

                                                                                                                                            <form
                                                                                                                                                action="{{ route('intern.updateStatus', ['intern' => $internship, 'status' => 'Ditolak']) }}"
                                                                                                                                                method="POST">
                                                                                                                                                @csrf
                                                                                                                                                @method('PATCH')
                                                                                                                                                <button type="submit" class="btn btn-sm btn-danger" title="Tolak">
                                                                                                                                                    <i class="fas fa-times"></i> Tolak
                                                                                                                                                </button>
                                                                                                                                            </form>
                                                                                                                                        </td>

                                                                                                                                    </tr>
                                    @endforeach

                                    @if ($intern->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">No internships found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-3 px-4">
                            {{ $intern->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>