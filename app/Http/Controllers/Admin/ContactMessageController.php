<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageStoreRequest;
use App\Http\Requests\ContactMessageUpdateRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ContactMessageController extends Controller implements HasMiddleware
{
    // Permissies koppelen aan de methodes
    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index contactmessage'), only: ['index']),
            new Middleware(PermissionMiddleware::using('show contactmessage'), only: ['show']),
            new Middleware(PermissionMiddleware::using('create contactmessage'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('edit contactmessage'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete contactmessage'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contactmessages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.contactmessages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactMessageStoreRequest $request): RedirectResponse
    {
        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->message = $request->message;
        $contactMessage->save();

        return to_route('admin.contactmessages.index')->with('status', 'Bericht succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactmessage): View
    {
        return view('admin.contactmessages.show', ['contactMessage' => $contactmessage]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactmessage): View
    {
        return view('admin.contactmessages.edit', compact('contactmessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactMessageUpdateRequest $request, ContactMessage $contactmessage): RedirectResponse
    {
        $contactmessage->status = $request->status;
        $contactmessage->save();

        return to_route('admin.contactmessages.index')->with('status', 'Bericht succesvol bijgewerkt.');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  ContactMessage  $contactmessage
     * @return View
     */
    public function delete(ContactMessage $contactmessage): View
    {
        return view('admin.contactmessages.delete', compact('contactmessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContactMessage  $contactmessage
     * @return RedirectResponse
     */
    public function destroy(ContactMessage $contactmessage): RedirectResponse
    {
        try {
            $contactmessage->delete();
        } catch (\Throwable $error) {
            report($error);
            return to_route('admin.contactmessages.index')->with('status-wrong', 'Bericht kan niet worden verwijderd.');
        }

        return to_route('admin.contactmessages.index')->with('status', 'Bericht succesvol verwijderd.');
    }
}
