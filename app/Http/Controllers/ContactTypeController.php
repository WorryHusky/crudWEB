<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    public function index()
    {
        $typeList = ContactType::all();
        return view('master.contact_type.index', compact('typeList'));
    }

    public function create()
    {
        return view('master.contact_type.add');
    }

    public function store(Request $request)
    {
        ContactType::create($request->all());
        return redirect()->route('contact_type.index');
    }

    public function edit($id)
    {
        $contact_type = ContactType::find($id);
        return view('master.contact_type.edit', compact('contact_type'));
    }

    public function update(Request $request, $id)
    {
        $contact_type = ContactType::find($id);
        $contact_type->update($request->all());
        return redirect()->route('contact_type.index');
    }

    public function destroy($id)
    {
        ContactType::destroy($id);
        return redirect()->route('contact_type.index');
    }
}
