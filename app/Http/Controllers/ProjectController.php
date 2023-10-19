<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
        // Display a list of projects
        public function index()
        {
            $projects = Project::all();
            return view('projects.index', compact('projects'));
        }

        // Show the details of a specific project
        public function show(Project $project)
        {
            return view('projects.show', compact('project'));
        }

        // Show the form for creating a new project
        public function create()
        {
            return view('projects.create');
        }

        // Store a newly created project in the database
        public function store(Request $request)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $project = Project::create($validatedData);

            return redirect()->route('projects.index')
                ->with('success', 'Project "' . $project->name . '" created successfully.');

        }
    
        // Show the form for editing an existing project
        public function edit(Project $project)
        {
            return view('projects.edit', compact('project'));
        }
    
        // Update the specified project in the database
        public function update(Request $request, Project $project)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $project->update($request->all());

            return redirect()->route('projects.index')
                ->with('success', 'Project updated successfully.');
        }

        // Remove the specified project from the database
        public function destroy(Project $project)
        {
            $project->delete();

            return redirect()->route('projects.index')
                ->with('success', 'Project deleted successfully.');
        }
}
