<x-app-layout>
    <div class="container-fluid">
        <form action="{{ route('intern.update', $Intern) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Data Magang</h5>

                    <input type="hidden" name="user_id" value="{{ $Intern->user_id }}">

                    @include('intern._form', ['intern' => $Intern])

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-secondary ms-2">Batal</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>