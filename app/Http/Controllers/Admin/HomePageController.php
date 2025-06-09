<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        $homepages = HomePage::get();

        return view('admin.homepages.index', compact('homepages'));
    }
    public function create()
    {
        return view('admin.homepages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'sub_title.en' => 'nullable|string|max:255',
            'sub_title.kh' => 'nullable|string|max:255',
            'sub_title1.en' => 'nullable|string|max:255',
            'sub_title1.kh' => 'nullable|string|max:255',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'sub_title' => [
                'en' => $validated['sub_title']['en'],
                'kh' => $validated['sub_title']['kh'],
            ],
            'sub_title1' => [
                'en' => $validated['sub_title1']['en'],
                'kh' => $validated['sub_title1']['kh'],
            ],
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
        ];

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('homepage_banner', 'custom');
        }

        $i = HomePage::create($data);

        return $i
            ? redirect()->route('homepage.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $homepage = HomePage::findOrFail($id);
        return view('admin.homepages.edit', compact('homepage'));
    }

    public function update(Request $request, string $id)
    {
        $homepage = HomePage::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|string|max:255',
            'title.kh' => 'nullable|string|max:255',
            'sub_title.en' => 'nullable|string|max:255',
            'sub_title.kh' => 'nullable|string|max:255',
            'sub_title1.en' => 'nullable|string|max:255',
            'sub_title1.kh' => 'nullable|string|max:255',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'],
                'kh' => $validated['title']['kh'],
            ],
            'sub_title' => [
                'en' => $validated['sub_title']['en'],
                'kh' => $validated['sub_title']['kh'],
            ],
            'sub_title1' => [
                'en' => $validated['sub_title1']['en'],
                'kh' => $validated['sub_title1']['kh'],
            ],
            'content' => [
                'en' => $validated['content']['en'],
                'kh' => $validated['content']['kh'],
            ],
        ];

        if($request->hasFile('image')){
            if($homepage->image && Storage::disk('custom')->exists($homepage->image)){
                Storage::disk('custom')->delete($homepage->image);
            }

            $data['image'] = $request->file('image')->store('homepage_banner', 'custom');
        }

        $i = $homepage->update($data);

        return $i
            ? redirect()->route('homepage.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
