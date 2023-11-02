<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Transaksi;
use App\Services\Project\ProjectService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected ProjectService $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request): \Illuminate\Http\RedirectResponse
    {
        // Validate Request
        $validatedData = $request->validated();

        // Store Project
        $this->projectService->create($validatedData);

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

    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Tambahkan validasi sesuai kebutuhan Anda
        $validatedData = $request->validated();

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
