<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactFormSubmitted;
use App\Models\Contact;

class ContactController extends Controller
{
    public function allContacts()
    {
        $allContactLists = Contact::all();
        return view('admin.contacts.all-contacts-list', compact('allContactLists'));
    }

    public function submitContact(Request $request)
    {
        // Check if the email already exists
        $isEmailExists = Contact::where('email', $request->email)->exists();
        if ($isEmailExists) {
            return response()->json([
                'status' => 400,
                'message' => 'You have already contacted us.',
                'data' => []
            ], 400);
        }

        // Create contact
        $newContact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        // Send email
        Mail::to('singhthakur906@gmail.com')->send(new ContactFormSubmitted($newContact));

        // Check if contact was submitted successfully
        if ($newContact) {
            return response()->json([
                'status' => 200,
                'message' => 'Contact submitted successfully',
                'data' => [$newContact]
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Oops, something went wrong...',
                'data' => []
            ], 400);
        }
    }
}
