<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectList;
use Illuminate\Http\Request;

class ProjectListController extends Controller
{
    public function index()
    {
        $projectlists = ProjectList::get();

        return view('admin.projectlists.index', compact('projectlists'));
    }
    public function create()
    {
        return view('admin.projectlists.create');
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

        $i = ProjectList::create($data);

        return $i
            ? redirect()->route('projectlist.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $projectlist = ProjectList::findOrFail($id);
        return view('admin.projectlists.edit', compact('projectlist'));
    }

    public function update(Request $request, string $id)
    {
        $projectlist = ProjectList::findOrFail($id);

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


        $i = $projectlist->update($data);

        return $i
            ? redirect()->route('projectlist.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
