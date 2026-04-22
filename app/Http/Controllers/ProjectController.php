<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10); // atau all() jika tidak perlu pagination
        return view('projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $users = User::where('role', 'peserta')->get(); // ambil hanya user dengan role 'peserta'
        return view('projects.create', compact('users'));
    }
    

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'nullable|string|max:50',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'user_id' => 'required|integer|exists:users,id',
    ]);

    $imagePath = $request->file('image')->store('projects', 'public');

    Project::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imagePath,
        'status' => 'Belum Selesai', // Default status
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('projects.index')->with('success', 'Project created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::with('user')->findOrFail($id); // Optional: eager load relasi 'user'
    
        return view('projects.show', compact('project'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $users = User::where('role', 'peserta')->get();
    
        return view('projects.update', compact('project', 'users'));
    }
    
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'required|integer|exists:users,id',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }
    
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user_id,
        ]);
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $project = Project::findOrFail($id);

    // Hapus gambar dari storage
    if ($project->image && Storage::disk('public')->exists($project->image)) {
        Storage::disk('public')->delete($project->image);
    }

    $project->delete();

    return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
}
}
