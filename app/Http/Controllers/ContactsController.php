<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactsRequest $request)
    {
        try {
            Contacts::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact
            ]);
            return redirect()->route('contacts.index')->with('success', 'Success!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Contacts $contacts)
    {
        //
    }

    public function edit(Contacts $contacts)
    {
        //
    }

    public function update(Request $request, Contacts $contacts)
    {
        //
    }

    public function destroy(Contacts $contacts)
    {
        //
    }
}
