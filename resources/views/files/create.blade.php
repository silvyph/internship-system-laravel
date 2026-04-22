<x-app-layout>
    <div class="container-fluid">
        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Upload File</h5>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">User (Peserta)</label>
                        <select name="user_id" class="form-control" required>
                            <option value="">-- Pilih Peserta --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama File</label>
                        <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" name="file" class="form-control" required>
                        @error('file')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Sertifikat" {{ old('type') == 'Sertifikat' ? 'selected' : '' }}>Sertifikat
                            </option>
                            <option value="Surat" {{ old('type') == 'Surat' ? 'selected' : '' }}>Surat</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Upload</button>
                    <a href="{{ route('files.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>