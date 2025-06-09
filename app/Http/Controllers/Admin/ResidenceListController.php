<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ResidenceList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResidenceListController extends Controller
{
    public function index()
    {
        $residencelists = ResidenceList::get();

        return view('admin.residencelists.index', compact('residencelists'));
    }
    public function create()
    {
        return view('admin.residencelists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
        ];

        $i = ResidenceList::create($data);

        return $i
            ? redirect()->route('residencelist.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $residencelist = ResidenceList::findOrFail($id);
        return view('admin.residencelists.edit', compact('residencelist'));
    }

    public function update(Request $request, string $id)
    {
        $residencelist = ResidenceList::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
        ];

        $i = $residencelist->update($data);

        return $i
            ? redirect()->route('residencelist.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
