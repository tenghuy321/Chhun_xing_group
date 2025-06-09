<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutpages = AboutPage::get();

        return view('admin.aboutpages.index', compact('aboutpages'));
    }
    public function create()
    {
        return view('admin.aboutpages.create');
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
            $data['image'] = $request->file('image')->store('aboutpage_banner', 'custom');
        }

        $i = AboutPage::create($data);

        return $i
            ? redirect()->route('aboutpage.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $aboutpage = AboutPage::findOrFail($id);
        return view('admin.aboutpages.edit', compact('aboutpage'));
    }

    public function update(Request $request, string $id)
    {
        $aboutpage = AboutPage::findOrFail($id);

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
            if ($aboutpage->image && Storage::disk('custom')->exists($aboutpage->image)) {
                Storage::disk('custom')->delete($aboutpage->image);
            }

            $data['image'] = $request->file('image')->store('aboutpage_banner', 'custom');
        }

        $i = $aboutpage->update($data);

        return $i
            ? redirect()->route('aboutpage.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
