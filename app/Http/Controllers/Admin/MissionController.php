<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $mission_page = Mission::get();

        return view('admin.mission.index', compact('mission_page'));
    }
    public function create()
    {
        return view('admin.mission.create');
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

        $i = Mission::create($data);

        return $i
            ? redirect()->route('mission_page.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $mission = Mission::findOrFail($id);
        return view('admin.mission.edit', compact('mission'));
    }

    public function update(Request $request, string $id)
    {
        $mission = Mission::findOrFail($id);

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

        $i = $mission->update($data);

        return $i
            ? redirect()->route('mission_page.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
