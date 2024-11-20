<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function index1()
    {
        // $projects = Project::all();
        $projects = Project::paginate(10);
        // Ensure images is an array for each project
        foreach ($projects as $project) {
            if (is_string($project->images)) {
                $project->images = json_decode($project->images, true);
            }
        }

        return view('admin.projects.index', compact('projects'));
    }
    // end method


    // Show the form for creating a new project
    public function create()
    {
        if (Auth::user()->role !== 'user') {
            return view('admin.projects.create');
        }
        return redirect()->route('admin.projects.index1')->with('error', 'Access denied');
    }

    // Store a new project in the database
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'user') {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('projects', 'public');
                    $imagePaths[] = $path;
                }
            }

            Project::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'images' => $imagePaths,
            ]);

            return redirect()->route('admin.projects.index1')->with('success', 'Project created successfully');
        }
        return redirect()->route('admin.projects.index1')->with('error', 'Access denied');
    }

    // Show the form for editing an existing project
    public function edit($id)
    {
        if (Auth::user()->role !== 'user') {
            $project = Project::findOrFail($id);
            return view('admin.projects.edit', compact('project'));
        }
        return redirect()->route('admin.projects.index1')->with('error', 'Access denied');
    }

    // Update an existing project in the database
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'user') {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $project = Project::findOrFail($id);
            $project->title = $request->input('title');
            $project->description = $request->input('description');

            $newImages = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('projects', 'public');
                    $newImages[] = $path;
                }
            }

            $existingImages = $project->images ?? [];
            if (!is_array($existingImages)) {
                $existingImages = [];
            }

            $removedImages = json_decode($request->input('removed_images', '[]'), true);
            if (!is_array($removedImages)) {
                $removedImages = [];
            }

            $updatedImages = array_diff($existingImages, $removedImages);
            $project->images = array_merge($updatedImages, $newImages);

            foreach ($removedImages as $removedImage) {
                Storage::disk('public')->delete($removedImage);
            }

            $project->save();

            return redirect()->route('admin.projects.index1')->with('success', 'Project updated successfully!');
        }
        return redirect()->route('admin.projects.index1')->with('error', 'Access denied');
    }

    // Delete a project from the database
    public function destroy($id)
    {
        if (Auth::user()->role !== 'user') {
            $project = Project::findOrFail($id);
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
            $project->delete();

            return redirect()->route('admin.projects.index1')->with('success', 'Project deleted successfully');
        }
        return redirect()->route('admin.projects.index1')->with('error', 'Access denied');
    }
}
