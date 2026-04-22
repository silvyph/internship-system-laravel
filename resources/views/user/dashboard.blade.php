<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Magang') }}
        </h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-8 mb-lg-0 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="font-weight-bold mb-3">Program Magang Sekolah</h4>

                        @if ($intern)
                            <p class="text-sm text-muted mb-3">
                                Anda telah mendaftar magang dengan data berikut:
                            </p>

                            <ul class="list-group mb-3">
                                <li class="list-group-item"><strong>Nama:</strong> {{ $intern->name }}</li>
                                <li class="list-group-item"><strong>Instansi:</strong> {{ $intern->institution_name }}</li>
                                <li class="list-group-item"><strong>Jurusan:</strong> {{ $intern->major }}</li>
                                <li class="list-group-item"><strong>Status:</strong> {{ $intern->status }}</li>
                            </ul>

                            <a href="{{ route('user.detail', $intern->id) }}" class="btn btn-outline-info me-2">
                                <i class="fas fa-eye me-1"></i> Lihat
                            </a>
                            <a href="{{ route('user.edit', $intern->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                        @else
                            <p class="text-sm text-muted mb-4">
                                Selamat datang di halaman pendaftaran magang. Silakan daftarkan diri Anda untuk mengikuti
                                program magang.
                            </p>

                            <a href="{{ route('intern.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i> Daftar Magang
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                        style="background-image: url('{{ asset('assets/img/ivancik.jpg') }}');">
                        <span class="mask bg-gradient-dark opacity-7"></span>
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3 text-white">
                            <h5 class="font-weight-bolder text-white mb-3">Manfaat Magang</h5>
                            <ul class="ps-3">
                                <li>Pengalaman langsung di dunia kerja</li>
                                <li>Meningkatkan keterampilan profesional</li>
                                <li>Membangun jaringan industri</li>
                            </ul>
                            <a href="javascript:;" class="text-white text-sm font-weight-bold mt-auto">
                                Pelajari lebih lanjut
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user-layout>