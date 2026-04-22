<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class InternController extends Controller
{
    public function index()
    {
        $intern = Intern::with('user', 'division')->latest()->paginate(10);
        return view('intern.index', compact('intern'));
    }

    public function create()
    {
        $users = User::where('role', 'peserta')->get();
        $divisions = Division::all();
        return view('intern.create', compact('users', 'divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'letter_date' => 'required|date',
            'institution_name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'division_id' => 'nullable|exists:divisions,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'request_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'acceptance_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'kesbangpol_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'documentation' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
        ]);

        $data = $request->only([
            'letter_date', 'institution_name', 'major', 'division_id',
            'start_date', 'end_date', 'name', 'email', 'address',
            'date_of_birth', 'phone'
        ]);

        $data['user_id'] = auth()->id();

        $dokumenTerupload = [];

        foreach (['request_letter', 'acceptance_letter', 'kesbangpol_letter', 'documentation'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store("intern/$field", 'public');
                $dokumenTerupload[] = $field;
            }
        }

        // Mengecek apakah ketiga dokumen wajib sudah lengkap
        $isComplete = collect(['request_letter', 'acceptance_letter', 'kesbangpol_letter'])
            ->every(fn($f) => in_array($f, $dokumenTerupload));

        $data['documentation'] = $isComplete ? 'Lengkap' : 'Belum Lengkap';

        Intern::create($data);

        return redirect()->route('intern.index')->with('success', 'Intern created.');
    }

    public function edit(Intern $Intern)
    {
        $users = User::where('role', 'peserta')->get();
        $divisions = Division::all();
        return view('intern.edit', compact('Intern', 'users', 'divisions'));
    }

    public function update(Request $request, Intern $Intern)
    {
        $request->validate([
            'letter_date' => 'required|date',
            'institution_name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'division_id' => 'nullable|exists:divisions,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'request_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'acceptance_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'kesbangpol_letter' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'documentation' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
        ]);

        $data = $request->except(['request_letter', 'acceptance_letter', 'kesbangpol_letter', 'documentation']);

        foreach (['request_letter', 'acceptance_letter', 'kesbangpol_letter', 'documentation'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($Intern->$field) {
                    Storage::disk('public')->delete($Intern->$field);
                }

                $data[$field] = $request->file($field)->store("intern/$field", 'public');
            }
        }

        $Intern->update($data);

        return redirect()->route('user.dashboard')->with('success', 'Intern updated.');
    }

    public function destroy(Intern $Intern)
    {
        $Intern->delete();
        return redirect()->route('intern.index')->with('success', 'Intern deleted.');
    }

    public function updateStatus(Intern $intern, $status)
    {
        if (!in_array($status, ['Diterima', 'Ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $intern->update(['status' => $status]);

        return redirect()->route('intern.index')->with('success', "Status updated to $status.");
    }

    public function show(Intern $intern)
    {
        return view('intern.show', compact('intern'));
    }

    public function recommendDivision(Request $request)
    {
        $request->validate([
            'major' => 'required|string',
            'institution_name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        try {
            // Data untuk dikirim ke API KNN (hanya field yang tersedia)
            $data = [
                'jurusan' => $request->major,
                'mapel1' => 'Pemrograman', // Default value
                'mapel2' => 'Basis Data',  // Default value
                'skill_teknis' => 'HTML, CSS, JavaScript', // Default value
                'sertifikasi' => 'Web Developer', // Default value
                'proyek' => 'Sistem Informasi', // Default value
                'tanggal_mulai' => $request->start_date,
                'tanggal_akhir' => $request->end_date
            ];

            $client = new Client();
            $response = $client->post('http://localhost:5000/predict', [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'timeout' => 30,
                'connect_timeout' => 10
            ]);

            $result = json_decode($response->getBody(), true);

            if (isset($result['success']) && $result['success']) {
                // Cari division_id berdasarkan nama divisi yang diprediksi
                $division = Division::where('name', $result['predicted_divisi'])->first();

                if (!$division) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Divisi yang diprediksi tidak ditemukan dalam database'
                    ], 404);
                }

                return response()->json([
                    'success' => true,
                    'recommended_division' => $result['predicted_divisi'],
                    'division_id' => $division->id,
                    'confidence' => $result['confidence'],
                    'input_data' => $result['input_data']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $result['error'] ?? 'Error dari API KNN'
                ], 400);
            }

        } catch (RequestException $e) {
            // Fallback ke metode lama jika API KNN tidak tersedia
            return $this->fallbackRecommendation($request);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan internal: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Fallback recommendation method ketika API KNN down
     */
    private function fallbackRecommendation(Request $request)
    {
        $major = strtolower($request->major);
        $institution = strtolower($request->institution_name);
        $k = 5;

        // Ambil semua intern sebelumnya yang sudah ada division_id
        $history = Intern::whereNotNull('division_id')->get();

        if ($history->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data historis untuk rekomendasi fallback'
            ], 404);
        }

        // Hitung jarak sederhana berdasarkan jurusan dan instansi saja
        $scored = $history->map(function ($intern) use ($major, $institution) {
            $distance = 0;
            $distance += levenshtein(strtolower($intern->major), $major);
            $distance += levenshtein(strtolower($intern->institution_name), $institution);
            return [
                'division_id' => $intern->division_id,
                'score' => $distance
            ];
        });

        // Ambil K terdekat
        $topK = collect($scored)->sortBy('score')->take($k);

        // Hitung frekuensi divisi
        $recommendedDivisionId = $topK->groupBy('division_id')
            ->sortByDesc(function ($group) {
                return $group->count();
            })
            ->keys()
            ->first();

        $division = Division::find($recommendedDivisionId);

        if (!$division) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat memberikan rekomendasi fallback'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'recommended_division' => $division->name,
            'division_id' => $division->id,
            'confidence' => 0.6, // Confidence rendah untuk fallback
            'fallback' => true,
            'message' => 'Menggunakan metode backup (API KNN tidak tersedia)'
        ]);
    }

    /**
     * Health check untuk API KNN
     */
    public function checkKnnHealth()
    {
        try {
            $client = new Client();
            $response = $client->get('http://localhost:5000/health', [
                'timeout' => 5,
                'connect_timeout' => 3
            ]);

            $result = json_decode($response->getBody(), true);

            return response()->json([
                'status' => 'connected',
                'knn_status' => $result['status'] ?? 'unknown',
                'model_loaded' => $result['model_loaded'] ?? false,
                'n_classes' => $result['n_classes'] ?? 0
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'disconnected',
                'message' => 'API KNN tidak dapat dihubungi: ' . $e->getMessage()
            ], 503);
        }
    }
}