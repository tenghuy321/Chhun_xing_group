<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $data = [
            'location' => [
                'en' => $request->input('location.en', ''),
                'kh' => $request->input('location.kh', ''),
            ],
            'email' => $request->input('email', ''),
            'phone_number1' => $request->input('phone_number1', ''),
            'phone_number2' => $request->input('phone_number2', ''),
            'facebook' => $request->input('facebook', ''),
            'telegram' => $request->input('telegram', ''),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('contacts', 'custom');
        }

        $i = Contact::create($data);

        return $i
            ? redirect()->route('contact.index')->with('success', 'Created successfully!')
            : redirect()->back()->with('error', 'Failed to create Contact.')->withInput();
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $data = [
            'location' => [
                'en' => $request->input('location.en', ''),
                'kh' => $request->input('location.kh', ''),
            ],
            'email' => $request->input('email', ''),
            'phone_number1' => $request->input('phone_number1', ''),
            'phone_number2' => $request->input('phone_number2', ''),
            'facebook' => $request->input('facebook', ''),
            'telegram' => $request->input('telegram', ''),
        ];


        if ($request->hasFile('image')) {
            if ($contact->image && Storage::disk('custom')->exists($contact->image)) {
                Storage::disk('custom')->delete($contact->image);
            }

            $data['image'] = $request->file('image')->store('contacts', 'custom');
        }

        $i = $contact->update($data);

        return $i
            ? redirect()->route('contact.index')->with('success', 'Updated Successfully.')
            : redirect()->back()->with('succees', 'Failed to update');
    }
}
