<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $Contactlist = Contact::all();
        return view('master.contact.index', compact('Contactlist'));
    }

    public function create()
    {
        return view('master.contact.add');
    }

    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('contact.index');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('master.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->update($request->all());
        return redirect()->route('contact.index');
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('Contact.index');
    }
}
