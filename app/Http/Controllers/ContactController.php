<?php

namespace App\Http\Controllers;

use App\Mail\Contact as MailContact;
use App\Mail\Test;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['success'] = 0;
        $data['errors'] = [];

        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:50',
            'message' => 'required|min:5|max:500',
        ];

        $validated = Validator::make(request()->all(), $rules);

        if ($validated->fails()) {
            $data['errors']['first_name'] = $validated->errors()->first('first_name');
            $data['errors']['last_name'] = $validated->errors()->first('last_name');
            $data['errors']['email'] = $validated->errors()->first('email');
            $data['errors']['subject'] = $validated->errors()->first('subject');
            $data['errors']['message'] = $validated->errors()->first('message');

        } else {
            $attributes = $validated->validated();

            Contact::create($attributes);

            Mail::to("dlukmanul.h@gmail.com")->send(new MailContact(
                $attributes['first_name'],
                $attributes['last_name'],
                $attributes['email'],
                $attributes['subject'],
                $attributes['message'],
            ));

            $data['success'] = 1;
            $data['message'] = "Thank you for contacting with us";
        }

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
