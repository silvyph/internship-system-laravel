<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\File;
use App\Models\Intern;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class UserInternController extends Controller
{
    public function index()
    {
        $intern = \App\Models\Intern::where('user_id', auth()->id())->first();
    
        return view('user.dashboard', compact('intern'));
    }
    
    public function file()
    {
        $files = File::where('user_id', auth()->id())->latest()->paginate(10);
        return view('user.file',compact('files'));
    }

    public function task()
    {
        $projects = Project::where('user_id', auth()->id())->latest()->paginate(10);
        return view('user.task', compact('projects'));
    }
    
    public function detail(Intern $intern)
    {
        return view('user.detail', compact('intern'));
    }

    public function edit(Intern $Intern)
    {
        $users = User::where('role', 'peserta')->get();
        $divisions = Division::all();
        return view('user.edit', compact('Intern', 'users', 'divisions'));
    }

    public function intern()
    {
        return view('user.intern');
    }

    public function task_detail(string $id)
    {
        $project = Project::with('user')->findOrFail($id); // Optional: eager load relasi 'user'
    
        return view('user.task_detail', compact('project'));
    }
}
