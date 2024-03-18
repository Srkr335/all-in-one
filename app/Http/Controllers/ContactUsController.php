<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function showForm()
    {   
        
        

        return view('contact-us');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contact_us'],
            'message' => ['required'],
        ]);
    
        $contact_us = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
    
        return redirect()->route('contact.us')->with('success', 'Your message has been sent successfully!');
    }



    
}