<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.contacts');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request,[
//            'contact_name' => 'required|max255',
//            'email' => 'required|email',
//            'phone' => 'required|max255',
//            'instruction' => 'max255',
//            'address_address' => 'max255',
//            'address_latitude' => 'max255',
//            'address_longitude' => 'max255',
//            'address' => 'max255',
//        ]);
        $contacts = new Contacts();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->instruction = $request->instruction;
        $contacts->address_address = $request->address_address;
        $contacts->address_latitude = $request->address_latitude;
        $contacts->address_longitude = $request->address_longitude;

        if ($contacts->save()){
            return redirect()->route('contacts.show', $contacts->id);
        }else {
            session::flash('Fuck');
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

        return view("manage.contact.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $contacts)
    {
        //
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
