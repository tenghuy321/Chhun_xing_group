<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ResidencePage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResidencePageController extends Controller
{
    public function index()
    {
        $residencepages = ResidencePage::get();

        return view('admin.residencepages.index', compact('residencepages'));
    }
    public function create()
    {
        return view('admin.residencepages.create');
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
            $data['image'] = $request->file('image')->store('residencepages', 'custom');
        }

        $i = ResidencePage::create($data);

        return $i
            ? redirect()->route('residence_page.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $residencepage = ResidencePage::findOrFail($id);
        return view('admin.residencepages.edit', compact('residencepage'));
    }

    public function update(Request $request, string $id)
    {
        $residencepage = ResidencePage::findOrFail($id);

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
            if ($residencepage->image && Storage::disk('custom')->exists($residencepage->image)) {
                Storage::disk('custom')->delete($residencepage->image);
            }

            $data['image'] = $request->file('image')->store('residencepages', 'custom');
        }

        $i = $residencepage->update($data);

        return $i
            ? redirect()->route('residence_page.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
