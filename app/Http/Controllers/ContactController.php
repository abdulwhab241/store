<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function submit(ContactRequest $request)
    {
        $contact = new  Contact();
        $contact -> name = strip_tags($request->input('name')) ;
        $contact -> email = strip_tags($request->input('email')) ;
        $contact -> mobile = strip_tags($request->input('mobile') );
        $contact -> title = strip_tags($request->input('title') );
        $contact -> message = strip_tags($request->input('content') );

        $contact -> save();
        return redirect()-> back()->with('message', 'تم الارسال بنجاح');
    }
}
