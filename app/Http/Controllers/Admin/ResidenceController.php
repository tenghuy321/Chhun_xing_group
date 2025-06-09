<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Residence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResidenceController extends Controller
{
    public function index()
    {
        $residences = Residence::orderBy('order')->get();
        return view('admin.residences.index', compact('residences'));
    }

    public function create()
    {
        return view('admin.residences.create');
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
            $path = $imageFile->store("residences/{$folderName}", 'custom');
            $imagePaths[] = $path;
        }


        Residence::create([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'image' => json_encode($imagePaths),
            'order' => Residence::count() + 1
        ]);

        return redirect()->route('residence.index')
            ->with('success', 'Created Successfully!');
    }

    public function edit(string $id)
    {
        $residence = Residence::findOrFail($id);
        return view('admin.residences.edit', compact('residence'));
    }

    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'name.en' => 'nullable|string',
            'name.kh' => 'nullable|string',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $residence = Residence::findOrFail($id);
        $folderName = strtolower(str_replace(' ', '_', $validated['name']['en']));

        $imagePaths = json_decode($residence->image, true) ?? [];

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
                $path = $imageFile->store("residences/{$folderName}", 'custom');
                $imagePaths[] = $path;
            }
        }

        $residence->update([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'image' => json_encode(array_values($imagePaths))
        ]);

        return redirect()->route('residence.index')
            ->with('success', 'Updated successfully!');
    }

    public function delete(string $id)
    {
        $residence = Residence::findOrFail($id);
        $imagePaths = json_decode($residence->image, true) ?? [];

        foreach ($imagePaths as $image) {
            if (Storage::disk('custom')->exists($image)) {
                Storage::disk('custom')->delete($image);
            }
        }

        // Reorder remaining projects
        Residence::where('order', '>', $residence->order)->decrement('order');

        $residence->delete();

        return redirect()->route('residence.index')
            ->with('success', 'Deleted successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:projects,id',
        ]);

        foreach ($request->ids as $index => $id) {
            Residence::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
