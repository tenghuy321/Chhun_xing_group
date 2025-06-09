<?php

namespace App\Http\Controllers\Admin;

use App\Models\CoreValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CoreValueController extends Controller
{
    public function index()
    {
        $core_values = CoreValue::orderBy('order')->get();

        return view('admin.core_values.index', compact('core_values'));
    }
    public function create()
    {
        return view('admin.core_values.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string',
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

        $data['order'] = CoreValue::max('order') + 1;

        $i = CoreValue::create($data);

        return $i
            ? redirect()->route('core_value.index')->with('success', 'Created Successfully')
            : redirect()->back()->with('error', 'Failed to created');
    }

    public function edit(string $id)
    {
        $core_value = CoreValue::findOrFail($id);
        return view('admin.core_values.edit', compact('core_value'));
    }

    public function update(Request $request, string $id)
    {
        $core_value = CoreValue::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string',
            'title.kh' => 'nullable|string',
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


        $i = $core_value->update($data);

        return $i
            ? redirect()->route('core_value.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }

    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            CoreValue::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $core_value = CoreValue::findOrFail($id);
        if ($core_value->image && Storage::disk('custom')->exists($core_value->image)) {
            Storage::disk('custom')->delete($core_value->image);
        }

        $i = $core_value->delete();

        return $i
            ? redirect()->route('core_value.index')->with('success', 'Deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
