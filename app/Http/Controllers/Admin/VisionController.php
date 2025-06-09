<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Support\Facades\Storage;

class VisionController extends Controller
{
    public function index()
    {
        $vision_page = Vision::get();

        return view('admin.vision.index', compact('vision_page'));
    }
    public function create()
    {
        return view('admin.vision.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
        ];

        $i = Vision::create($data);

        return $i
            ? redirect()->route('vision_page.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $vision = Vision::findOrFail($id);
        return view('admin.vision.edit', compact('vision'));
    }

    public function update(Request $request, string $id)
    {
        $vision = Vision::findOrFail($id);

        $validated = $request->validate([
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
        ];

        $i = $vision->update($data);

        return $i
            ? redirect()->route('vision_page.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
