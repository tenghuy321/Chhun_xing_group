<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('order')->get();

        return view('admin.certificates.index', compact('certificates'));
    }
    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates', 'custom');
        }
        $data['order'] = Certificate::max('order') + 1;

        $i = Certificate::create($data);

        return $i
            ? redirect()->route('certificate.index')->with('success', 'Created Successfully!')
            : redirect()->back()->with('error', 'Failed to Created!');
    }

    public function edit(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, string $id)
    {
        $certificate = Certificate::findOrFail($id);


        if ($request->hasFile('image')) {
            if ($certificate->image && Storage::disk('custom')->exists($certificate->image)) {
                Storage::disk('custom')->delete($certificate->image);
            }

            $data['image'] = $request->file('image')->store('certificates', 'custom');
        }

        $i = $certificate->update($data);

        return $i
            ? redirect()->route('certificate.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            Certificate::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        if ($certificate->image && Storage::disk('custom')->exists($certificate->image)) {
            Storage::disk('custom')->delete($certificate->image);
        }

        $i = $certificate->delete();

        return $i
            ? redirect()->route('certificate.index')->with('success', 'Deleted successfully!')
            : redirect()->back()->with('error', 'Failed to delete.');
    }
}
