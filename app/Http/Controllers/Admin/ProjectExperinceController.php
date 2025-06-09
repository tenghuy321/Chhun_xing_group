<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProjectExperince;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectExperinceController extends Controller
{
    public function index()
    {
        $project_experinces = ProjectExperince::orderBy('order')->get();
        return view('admin.project_experinces.index', compact('project_experinces'));
    }

    public function create()
    {
        return view('admin.project_experinces.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'required|string',
            'title.kh' => 'required|string',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $folderName = strtolower(str_replace(' ', '_', $validated['title']['en']));
        $imagePaths = [];

        foreach ($request->file('images') as $imageFile) {
            $path = $imageFile->store("project_experinces/{$folderName}", 'custom');
            $imagePaths[] = $path;
        }


        ProjectExperince::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => json_encode($imagePaths),
            'order' => ProjectExperince::count() + 1
        ]);

        return redirect()->route('project_experince.index')
            ->with('success', 'Created Successfully!');
    }

    public function edit(string $id)
    {
        $project_experince = ProjectExperince::findOrFail($id);
        return view('admin.project_experinces.edit', compact('project_experince'));
    }

    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $project_experince = ProjectExperince::findOrFail($id);
        $folderName = strtolower(str_replace(' ', '_', $validated['title']['en']));

        $imagePaths = json_decode($project_experince->image, true) ?? [];

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
                $path = $imageFile->store("project_experinces/{$folderName}", 'custom');
                $imagePaths[] = $path;
            }
        }

        $project_experince->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => json_encode(array_values($imagePaths))
        ]);

        return redirect()->route('project_experince.index')
            ->with('success', 'Updated successfully!');
    }

    public function delete(string $id)
    {
        $project_experince = ProjectExperince::findOrFail($id);
        $imagePaths = json_decode($project_experince->image, true) ?? [];

        foreach ($imagePaths as $image) {
            if (Storage::disk('custom')->exists($image)) {
                Storage::disk('custom')->delete($image);
            }
        }

        // Reorder remaining projects
        ProjectExperince::where('order', '>', $project_experince->order)->decrement('order');

        $project_experince->delete();

        return redirect()->route('project_experince.index')
            ->with('success', 'Deleted successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:projects,id',
        ]);

        foreach ($request->ids as $index => $id) {
            ProjectExperince::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
