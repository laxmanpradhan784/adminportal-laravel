<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Mark as read if unread
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        
        return view('contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact message deleted successfully.');
    }

    public function updateStatus(Contact $contact, Request $request)
    {
        $request->validate([
            'status' => 'required|in:unread,read,replied'
        ]);

        $contact->update(['status' => $request->status]);
        
        return redirect()->route('contacts.show', $contact)->with('success', 'Status updated successfully.');
    }
}