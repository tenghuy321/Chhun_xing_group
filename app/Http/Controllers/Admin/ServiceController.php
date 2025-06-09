<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
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
            ]
        ];

        $data['order'] = Service::max('order') + 1;

        $i = Service::create($data);
        return $i
            ? redirect()->route('service.index')->with('success', 'Created Successfully')
            : redirect()->back()->with('error', 'Fail to Created');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

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
            ]
        ];

        $i = $service->update($data);

        return $i
            ? redirect()->route('service.index')->with('success', 'Updated Successfully')
            : redirect()->back()->with('error', 'Updated Successfully');
    }


    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Service::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $service = Service::findOrFail($id);
        if ($service->image && Storage::disk('custom')->exists($service->image)) {
            Storage::disk('custom')->delete($service->image);
        }

        $i = $service->delete();

        return $i
            ? redirect()->route('service.index')->with('success', 'Deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
