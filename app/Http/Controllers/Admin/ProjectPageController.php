<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectPageController extends Controller
{
    public function index()
    {
        $projectpages = ProjectPage::get();

        return view('admin.projectpages.index', compact('projectpages'));
    }
    public function create()
    {
        return view('admin.projectpages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projectpages', 'custom');
        }

        $i = ProjectPage::create($data);

        return $i
            ? redirect()->route('projectpage.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $projectpage = ProjectPage::findOrFail($id);
        return view('admin.projectpages.edit', compact('projectpage'));
    }

    public function update(Request $request, string $id)
    {
        $projectpage = ProjectPage::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
        ];

        if ($request->hasFile('image')) {
            if ($request->image && Storage::disk('custom')->exists($request->image)) {
                Storage::disk('custom')->delete($request->image);
            }

            $data['image'] = $request->file('image')->store('projectpages', 'custom');
        }

        $i = $projectpage->update($data);

        return $i
            ? redirect()->route('projectpage.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
