<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public function index()
    {
        $our_teams = OurTeam::orderBy('order')->get();

        return view('admin.our_teams.index', compact('our_teams'));
    }
    public function create()
    {
        return view('admin.our_teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.en' => 'nullable|string',
            'name.kh' => 'nullable|string',
            'position.en' => 'nullable|string',
            'position.kh' => 'nullable|string',
        ]);

        $data = [
            'name' => [
                'en' => $validated['name']['en'],
                'kh' => $validated['name']['kh'],
            ],
            'position' => [
                'en' => $validated['position']['en'],
                'kh' => $validated['position']['kh'],
            ],
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('our_teams', 'custom');
        }

        $data['order'] = OurTeam::max('order') + 1;


        $i = OurTeam::create($data);

        return $i
            ? redirect()->route('our_team.index')->with('success', 'Created Successfully')
            : redirect()->back()->with('error', 'Failed to created');
    }

    public function edit(string $id)
    {
        $our_team = OurTeam::findOrFail($id);
        return view('admin.our_teams.edit', compact('our_team'));
    }

    public function update(Request $request, string $id)
    {
        $our_team = OurTeam::findOrFail($id);

        $validated = $request->validate([
            'name.en' => 'nullable|string',
            'name.kh' => 'nullable|string',
            'position.en' => 'nullable|string',
            'position.kh' => 'nullable|string',
        ]);

        $data = [
            'name' => [
                'en' => $validated['name']['en'],
                'kh' => $validated['name']['kh'],
            ],
            'position' => [
                'en' => $validated['position']['en'],
                'kh' => $validated['position']['kh'],
            ],
        ];

        if ($request->hasFile('image')) {
            if ($our_team->image && Storage::disk('custom')->exists($our_team->image)) {
                Storage::disk('custom')->delete($our_team->image);
            }

            $data['image'] = $request->file('image')->store('our_teams', 'custom');
        }

        $i = $our_team->update($data);

        return $i
            ? redirect()->route('our_team.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            OurTeam::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $our_team = OurTeam::findOrFail($id);
        if ($our_team->image && Storage::disk('custom')->exists($our_team->image)) {
            Storage::disk('custom')->delete($our_team->image);
        }

        $i = $our_team->delete();

        return $i
            ? redirect()->route('our_team.index')->with('success', 'Deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
