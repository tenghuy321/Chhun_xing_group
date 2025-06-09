<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutListController extends Controller
{
    public function index()
    {
        $aboutlists = AboutList::get();

        return view('admin.aboutlists.index', compact('aboutlists'));
    }
    public function create()
    {
        return view('admin.aboutlists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'icon' => 'nullable|image',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
        ];

        $i = AboutList::create($data);

        return $i
            ? redirect()->route('aboutlist.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $aboutlist = AboutList::findOrFail($id);
        return view('admin.aboutlists.edit', compact('aboutlist'));
    }

    public function update(Request $request, string $id)
    {
        $aboutlist = AboutList::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'icon' => 'nullable|image',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
        ];

        if ($request->hasFile('icon')) {
            if ($aboutlist->icon && Storage::disk('custom')->exists($aboutlist->icon)) {
                Storage::disk('custom')->delete($aboutlist->icon);
            }

            $data['icon'] = $request->file('icon')->store('aboutlists', 'custom');
        }

        $i = $aboutlist->update($data);

        return $i
            ? redirect()->route('aboutlist.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
