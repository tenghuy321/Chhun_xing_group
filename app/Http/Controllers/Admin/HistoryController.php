<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::get();

        return view('admin.histories.index', compact('histories'));
    }
    public function create()
    {
        return view('admin.histories.create');
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
            $path = $imageFile->store("histories/{$folderName}", 'custom');
            $imagePaths[] = $path;
        }

        History::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => json_encode($imagePaths),
        ]);

        return redirect()->route('history.index')
            ->with('success', 'Created successfully!');
    }

    public function edit(string $id)
    {
        $history = History::findOrFail($id);
        return view('admin.histories.edit', compact('history'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $history = History::findOrFail($id);
        $imagePaths = json_decode($history->image, true) ?? [];
        $folderName = strtolower(str_replace(' ', '_', $validated['title']['en']));

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
                $path = $imageFile->store("histories/{$folderName}", 'custom');
                $imagePaths[] = $path;
            }
        }

        $history->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => json_encode(array_values($imagePaths))
        ]);

        return redirect()->route('history.index')
            ->with('success', 'Updated successfully!');
    }

    public function delete($id)
    {
        $history = History::findOrFail($id);
        $imagePaths = json_decode($history->image, true) ?? [];

        foreach ($imagePaths as $image) {
            if (Storage::disk('custom')->exists($image)) {
                Storage::disk('custom')->delete($image);
            }
        }

        $history->delete();

        return redirect()->route('history.index')
            ->with('success', 'Deleted successfully!');
    }
}
