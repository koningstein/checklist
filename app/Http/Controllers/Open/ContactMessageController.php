<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageStoreRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Store a newly created contact message in storage.
     */
    public function store(ContactMessageStoreRequest $request): RedirectResponse
    {
        // Maak een nieuw contactbericht aan
        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->message = $request->message;
        $contactMessage->save();

        // Redirect met een succesvolle status
        return back()->with('status', 'Bedankt voor je bericht! We nemen snel contact met je op.');
    }
}
