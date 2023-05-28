<?php

namespace App\Http\Controllers;

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
        //
    }

    public function store(Request $request)
    {
        //
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
