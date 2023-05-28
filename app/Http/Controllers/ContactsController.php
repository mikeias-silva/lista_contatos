<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function store(StoreContactsRequest $request)
    {
        try {
            $newContact = Contacts::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact
            ]);
            Log::channel('daily')->debug("New Contacts id: $newContact->id");
            return redirect()->route('contacts.index')->with('success', 'Success!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Contacts $contacts)
    {
        //
    }

    public function edit(Contacts $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactsRequest $request, Contacts $contact)
    {
//        dd('oites');
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;

        try {
            $contact->save();
            Log::channel('daily')->debug("Contact updated id: $contact->id");
            return redirect()->route('contacts.index')->with('success', 'Success!');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);

        }

    }

    public function destroy(Contacts $contacts)
    {
        //
    }
}
