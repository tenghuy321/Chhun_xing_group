<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Msg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MsgController extends Controller
{
    public function index()
    {
        $msgs = Msg::get();

        return view('admin.msgs.index', compact('msgs'));
    }
    public function create()
    {
        return view('admin.msgs.create');
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

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('msgs', 'custom');
        }

        $i = Msg::create($data);

        return $i
            ? redirect()->route('msg.index')->with('success', 'Created')
            : redirect()->back()->with('error', 'Failed');
    }

    public function edit(string $id)
    {
        $msg = Msg::findOrFail($id);
        return view('admin.msgs.edit', compact('msg'));
    }

    public function update(Request $request, string $id)
    {
        $msg = Msg::findOrFail($id);

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

        if ($request->hasFile('image')) {
            if ($msg->image && Storage::disk('custom')->exists($msg->image)) {
                Storage::disk('custom')->delete($msg->image);
            }

            $data['image'] = $request->file('image')->store('msgs', 'custom');
        }

        $i = $msg->update($data);

        return $i
            ? redirect()->route('msg.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('error', 'Fail to Update data!');
    }
}
