<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Contact::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactUs = new Contact();
        $contactUs->name=$request->name;
        $contactUs->phone=$request->phone;
        $contactUs->email=$request->email;
        $contactUs->message=$request->message;
        $contactUs->save();

        Mail::to($request->email)->send(new ContactUs());
        return "stored feedback";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      Contact::find($id);
    }


}
