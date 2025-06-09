<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecialProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialProjectController extends Controller
{
    public function index()
    {
        $special_projects = SpecialProject::get();
        return view('admin.special_projects.index', compact('special_projects'));
    }

    public function create()
    {
        return view('admin.special_projects.create');
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
            ]
        ];

        if($request->hasFile('icon')){
            $data['icon'] = $request->file('icon')->store('special_project_icon', 'custom');
        }

        $i = SpecialProject::create($data);

        return $i
            ? redirect()->route('special_project.index')->with('success', 'Created Successfully')
            : redirect()->back()->with('error', 'Fail to Created');
    }

    public function edit(string $id)
    {
        $special_project = SpecialProject::findOrFail($id);
        return view('admin.special_projects.edit', compact('special_project'));
    }

    public function update(Request $request, string $id)
    {
        $special_project = SpecialProject::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ]
        ];

        if($request->hasFile('image')){
            if($special_project->image && Storage::disk('custom')->exists($special_project->image)){
                Storage::disk('custom')->delete($special_project->image);
            }

            $data['image'] = $request->file('image')->store('special_project_icon', 'custom');
        }

        $i = $special_project->update($data);

        return $i
            ? redirect()->route('special_project.index')->with('success', 'Updated Successfully !')
            : redirect()->back()->with('error', 'Failed to Update');
    }
}
