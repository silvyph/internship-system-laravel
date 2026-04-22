<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Magang
        </h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary text-white">
                        <h5 class="mb-0 text-white">Informasi Peserta Magang</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Nama:</strong>
                            <p class="text-muted mb-0">{{ $intern->name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <p class="text-muted mb-0">{{ $intern->email }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Telepon:</strong>
                            <p class="text-muted mb-0">{{ $intern->phone }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Alamat:</strong>
                            <p class="text-muted mb-0">{{ $intern->address }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Tanggal Lahir:</strong>
                            <p class="text-muted mb-0">
                                {{ \Carbon\Carbon::parse($intern->date_of_birth)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <strong>Instansi:</strong>
                            <p class="text-muted mb-0">{{ $intern->institution_name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Jurusan:</strong>
                            <p class="text-muted mb-0">{{ $intern->major }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Divisi:</strong>
                            <p class="text-muted mb-0">{{ $intern->division?->name ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Tanggal Magang:</strong>
                            <p class="text-muted mb-0">
                                {{ $intern->start_date ?? '-' }} s/d {{ $intern->end_date ?? '-' }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <strong>Status:</strong>
                            <span
                                class="badge {{ $intern->status == 'Diterima' ? 'bg-success' : ($intern->status == 'Ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $intern->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- File Preview --}}
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-gradient-info text-white">
                        <h6 class="mb-0 text-white">Dokumen Terlampir</h6>
                    </div>
                    <div class="card-body">
                        @php
                            $files = [
                                'request_letter' => 'Surat Permohonan',
                                'acceptance_letter' => 'Surat Penerimaan',
                                'kesbangpol_letter' => 'Surat Kesbangpol',
                                // 'documentation' => 'Dokumentasi',
                            ];
                        @endphp

                        @foreach ($files as $field => $label)
                            @php
                                $filePath = asset('storage/' . $intern->$field);
                                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                $canPreview = in_array(strtolower($extension), ['pdf', 'jpg', 'jpeg', 'png']);
                            @endphp

                            @if ($intern->$field)
                                <div class="mb-3">
                                    <strong>{{ $label }}:</strong><br>

                                    @if ($canPreview)
                                        <iframe src="{{ $filePath }}" class="w-100 border mt-2" height="200"></iframe>
                                    @else
                                        <p class="text-muted">Tidak dapat menampilkan file ({{ strtoupper($extension) }}).</p>
                                    @endif

                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                        <i class="fas fa-download me-1"></i> Download {{ $label }}
                                    </a>
                                </div>
                            @else
                                <p class="text-muted">{{ $label }} tidak tersedia.</p>
                            @endif
                        @endforeach

                    </div>
                </div>
                <a href="{{ route('user.dashboard', $intern) }}" class="btn btn-sm btn-info text-white">Kembali</a>
            </div>
        </div>
    </div>
</x-user-layout>