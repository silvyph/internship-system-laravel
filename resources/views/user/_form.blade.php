@php
    $isEdit = isset($intern);
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="letter_date" class="form-label">Tanggal Surat</label>
        <input type="date" name="letter_date" class="form-control"
            value="{{ old('letter_date', $intern->letter_date ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="institution_name" class="form-label">Nama Instansi</label>
        <input type="text" name="institution_name" id="institution_name" class="form-control"
            value="{{ old('institution_name', $intern->institution_name ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="major" class="form-label">Jurusan</label>
        <input type="text" name="major" id="major" class="form-control" value="{{ old('major', $intern->major ?? '') }}"
            required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="division_id" class="form-label d-flex justify-content-between align-items-center">
            <span>Divisi</span>
            <span id="recommended-badge" class="badge bg-info d-none">Rekomendasi</span>
        </label>
        <select name="division_id" id="division_id" class="form-control">
            <option value="">-- Pilih Divisi --</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ old('division_id', $intern->division_id ?? '') == $division->id ? 'selected' : '' }}>
                    {{ $division->name }}
                </option>
            @endforeach
        </select>
    </div>




    <div class="col-md-6 mb-3">
        <label for="start_date" class="form-label">Tanggal Mulai</label>
        <input type="date" name="start_date" class="form-control"
            value="{{ old('start_date', $intern->start_date ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="end_date" class="form-label">Tanggal Selesai</label>
        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $intern->end_date ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Nama Peserta</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $intern->name ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email Peserta</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $intern->email ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="phone" class="form-label">No. HP</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $intern->phone ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
        <input type="date" name="date_of_birth" class="form-control"
            value="{{ old('date_of_birth', $intern->date_of_birth ?? '') }}" required>
    </div>

    <div class="col-md-12 mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea name="address" class="form-control" rows="3"
            required>{{ old('address', $intern->address ?? '') }}</textarea>
    </div>

    {{-- <div class="col-md-12 mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" name="status" class="form-control"
            value="{{ old('status', $intern->status ?? 'Mendaftar') }}">
    </div> --}}

    <div class="col-md-6 mb-3">
        <label for="request_letter" class="form-label">Surat Permohonan</label>
        <input type="file" name="request_letter" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        @if(isset($intern) && $intern->request_letter)
            <a href="{{ asset('storage/' . $intern->request_letter) }}" target="_blank" class="d-block mt-2 text-primary">
                Lihat File
            </a>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label for="acceptance_letter" class="form-label">Surat Penerimaan</label>
        <input type="file" name="acceptance_letter" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        @if(isset($intern) && $intern->acceptance_letter)
            <a href="{{ asset('storage/' . $intern->acceptance_letter) }}" target="_blank"
                class="d-block mt-2 text-primary">
                Lihat File
            </a>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label for="kesbangpol_letter" class="form-label">Surat Kesbangpol</label>
        <input type="file" name="kesbangpol_letter" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        @if(isset($intern) && $intern->kesbangpol_letter)
            <a href="{{ asset('storage/' . $intern->kesbangpol_letter) }}" target="_blank"
                class="d-block mt-2 text-primary">
                Lihat File
            </a>
        @endif
    </div>

    {{-- <div class="col-md-6 mb-3">
        <label for="documentation" class="form-label">Dokumentasi (opsional)</label>
        <input type="file" name="documentation" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        @if(isset($intern) && $intern->documentation)
        <a href="{{ asset('storage/' . $intern->documentation) }}" target="_blank" class="d-block mt-2 text-primary">
            Lihat File
        </a>
        @endif
    </div> --}}

</div>