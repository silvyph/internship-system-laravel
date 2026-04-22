<?php

namespace App\Http\Controllers;

    use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    
    class FileController extends Controller
    {
        public function index()
        {
            $files = File::latest()->paginate(10);
            return view('files.index', compact('files'));
        }
    
        public function create()
        {
            $users = User::where('role', 'peserta')->get();
            return view('files.create', compact('users'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required|string|max:255',
                'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg,zip,rar|max:10240',
                'type' => 'required|string|max:50',
                'description' => 'nullable|string',
            ]);
    
            $path = $request->file('file')->store('uploads', 'public');
    
            File::create([
                'user_id' => $request->user_id,
                'nama' => $request->nama,
                'file' => $path,
                'type' => $request->type,
                'description' => $request->description,
            ]);
            
    
            return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
        }
    
        public function edit(File $file)
        {
            return view('files.edit', compact('file'));
        }
    
        public function update(Request $request, File $file)
        {
            $request->validate([
                'nama' => 'required|string|max:255',
                'file' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg,zip,rar|max:10240',
                'type' => 'required|string|max:50',
                'description' => 'nullable|string',
            ]);
    
            $data = $request->only(['nama', 'type', 'description']);
    
            if ($request->hasFile('file')) {
                Storage::disk('public')->delete($file->file);
                $data['file'] = $request->file('file')->store('uploads', 'public');
            }
    
            $file->update($data);
    
            return redirect()->route('files.index')->with('success', 'File updated successfully.');
        }
    
        public function destroy(File $file)
        {
            Storage::disk('public')->delete($file->file);
            $file->delete();
            return redirect()->route('files.index')->with('success', 'File deleted successfully.');
        }
    
        public function download(File $file)
        {
            return Storage::disk('public')->download($file->file, $file->nama);
        }
    }
    

