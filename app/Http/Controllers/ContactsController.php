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
        } catch (\Exception $exception) {
            Log::channel('daily')->error("Error trying create new contact $exception->getMessage()");
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
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
            Log::channel('daily')->error("Error trying edit id: $contact->id");
            Log::channel('daily')->error("Error trying edit $exception->getMessage()");
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);

        }

    }

    public function destroy(Contacts $contact)
    {
        try {
            $contact->delete();
            Log::channel('daily')->debug("Contact deleted id: $contact->id");
            return redirect()->route('contacts.index')->with('warning', 'Successfully deleted!');
        } catch (\Exception $exception) {
            Log::channel('daily')->error("Error trying delete id: $contact->id");
            Log::channel('daily')->error("Error trying delete $exception->getMessage()");
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function delete(Contacts $contact)
    {
        return view('contacts.delete', compact('contact'));
    }
}
