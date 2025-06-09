<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurPeople;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OurPeopleController extends Controller
{
    public function index()
    {
        $our_peoples = OurPeople::orderBy('order')->get();

        return view('admin.our_peoples.index', compact('our_peoples'));
    }
    public function create()
    {
        return view('admin.our_peoples.create');
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
            $data['image'] = $request->file('image')->store('our_peoples', 'custom');
        }

        $data['order'] = OurPeople::max('order') + 1;


        $i = OurPeople::create($data);

        return $i
            ? redirect()->route('our_people.index')->with('success', 'Created Successfully')
            : redirect()->back()->with('error', 'Failed to created');
    }

    public function edit(string $id)
    {
        $our_people = OurPeople::findOrFail($id);
        return view('admin.our_peoples.edit', compact('our_people'));
    }

    public function update(Request $request, string $id)
    {
        $our_people = OurPeople::findOrFail($id);

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
            if ($our_people->image && Storage::disk('custom')->exists($our_people->image)) {
                Storage::disk('custom')->delete($our_people->image);
            }

            $data['image'] = $request->file('image')->store('our_peoples', 'custom');
        }

        $i = $our_people->update($data);

        return $i
            ? redirect()->route('our_people.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            OurPeople::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $our_people = OurPeople::findOrFail($id);
        if ($our_people->image && Storage::disk('custom')->exists($our_people->image)) {
            Storage::disk('custom')->delete($our_people->image);
        }

        $i = $our_people->delete();

        return $i
            ? redirect()->route('our_people.index')->with('success', 'Deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
