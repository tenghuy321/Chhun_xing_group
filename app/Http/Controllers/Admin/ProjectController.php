<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.en' => 'required|string',
            'name.kh' => 'required|string',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $folderName = strtolower(str_replace(' ', '_', $validated['name']['en']));
        $imagePaths = [];

        foreach ($request->file('images') as $imageFile) {
            $path = $imageFile->store("projects/{$folderName}", 'custom');
            $imagePaths[] = $path;
        }

        Project::create([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'image' => json_encode($imagePaths),
            'order' => Project::count() + 1
        ]);

        return redirect()->route('project.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name.en' => 'nullable|string',
            'name.kh' => 'nullable|string',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
            'images' => 'sometimes|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $project = Project::findOrFail($id);
        $imagePaths = json_decode($project->image, true) ?? [];
        $folderName = strtolower(str_replace(' ', '_', $validated['name']['en']));

        if ($request->filled('removed_images')) {
            $removedImages = json_decode($request->removed_images, true);

            foreach ($removedImages as $removedImage) {
                if (Storage::disk('custom')->exists($removedImage)) {
                    Storage::disk('custom')->delete($removedImage);
                }
                $imagePaths = array_filter($imagePaths, fn($img) => $img !== $removedImage);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store("projects/{$folderName}", 'custom');
                $imagePaths[] = $path;
            }
        }

        $project->update([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'image' => json_encode(array_values($imagePaths))
        ]);

        return redirect()->route('project.index')
            ->with('success', 'Project updated successfully!');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $imagePaths = json_decode($project->image, true) ?? [];

        foreach ($imagePaths as $image) {
            if (Storage::disk('custom')->exists($image)) {
                Storage::disk('custom')->delete($image);
            }
        }

        // Reorder remaining projects
        Project::where('order', '>', $project->order)->decrement('order');

        $project->delete();

        return redirect()->route('project.index')
            ->with('success', 'Project deleted successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:projects,id',
        ]);

        foreach ($request->ids as $index => $id) {
            Project::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
