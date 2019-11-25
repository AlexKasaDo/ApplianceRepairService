<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::orderBy('id', 'asc')->paginate(10);
        return view('manage.contacts')->withContacts($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contacts = new Contacts();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->user_id = $request->user_id;
        $contacts->instruction = $request->instruction;
        $contacts->address_address = $request->address_address;
        $contacts->address_latitude = $request->address_latitude;
        $contacts->address_longitude = $request->address_longitude;
        if ($contacts->save()){
            return redirect()->route('contacts.show', $contacts->id);
        }else {
            return redirect()->route('contacts.create');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contacts::findOrFail($id);
        return view("manage.contact.show")->withContacts($contacts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contacts::findOrFail($id);
        return view("manage.contact.edit")->withContacts($contacts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacts = Contacts::findOrFail($id);
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->user_id = $request->user_id;
        $contacts->instruction = $request->instruction;
        $contacts->address_address = $request->address_address;
        $contacts->address_latitude = $request->address_latitude;
        $contacts->address_longitude = $request->address_longitude;

        if ($contacts->update()){

            return redirect()->route('contacts.show', $id);
        }else {
            session::flash('Fuck');
            return redirect()->route('contacts.edit', $id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
