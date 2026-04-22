<x-user-layout>
    <div class="container-fluid">
        <form action="{{ route('intern.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah Data Magang</h5>

                    @include('intern._form', ['intern' => null])

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-secondary ms-2">Batal</a>
                </div>
            </div>
        </form>
        
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const majorInput = document.querySelector('input[name="major"]');
                    const institutionInput = document.querySelector('input[name="institution_name"]');
                    const startDateInput = document.querySelector('input[name="start_date"]');
                    const endDateInput = document.querySelector('input[name="end_date"]');
                    const divisionSelect = document.querySelector('select[name="division_id"]');
                    const badge = document.getElementById('recommended-badge');

                    function recommendDivision() {
                        const major = majorInput.value.trim();
                        const institution = institutionInput.value.trim();
                        const startDate = startDateInput.value;
                        const endDate = endDateInput.value;

                        if (major && institution && startDate && endDate) {
                            fetch("{{ route('intern.recommend') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ 
                                    major: major,
                                    institution_name: institution,
                                    start_date: startDate,
                                    end_date: endDate
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success && data.division_id) {
                                    divisionSelect.value = data.division_id;
                                    divisionSelect.classList.add('bg-light', 'border-success');
                                    badge.classList.remove('d-none');
                                    badge.textContent = `Rekomendasi (${(data.confidence * 100).toFixed(1)}% yakin)`;
                                } else {
                                    badge.classList.add('d-none');
                                }
                            })
                            .catch(err => {
                                console.error("Recommendation error", err);
                                badge.classList.add('d-none');
                            });
                        }
                    }

                    // Event listeners
                    majorInput.addEventListener('blur', recommendDivision);
                    institutionInput.addEventListener('blur', recommendDivision);
                    startDateInput.addEventListener('change', recommendDivision);
                    endDateInput.addEventListener('change', recommendDivision);
                });
            </script>
        @endpush
    </div>
</x-user-layout>