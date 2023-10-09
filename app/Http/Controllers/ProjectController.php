<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');  // Asumsi Anda memiliki view 'projects.create'
    }

    public function store(Request $request)
    {

        // Tambahkan validasi sesuai kebutuhan Anda
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'uang_muka' => 'required|numeric',
            'uang_pinjaman' => 'required|numeric'
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));  // Asumsi Anda memiliki view 'projects.edit'
    }

    public function update(Request $request, Project $project)
    {
        // Tambahkan validasi sesuai kebutuhan Anda
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'uang_muka' => 'required|numeric',
            'uang_pinjaman' => 'required|numeric'
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
