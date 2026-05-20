<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'email.required' => t('contacts.validation.email.required'),
            'email.email' => t('contacts.validation.email.email'),
            'email.max' => t('contacts.validation.email.max'),
            'subject.required' => t('contacts.validation.subject.required'),
            'subject.string' => t('contacts.validation.subject.string'),
            'subject.max' => t('contacts.validation.subject.max'),
            'message.required' => t('contacts.validation.message.required'),
            'message.string' => t('contacts.validation.message.string'),
            'message.max' => t('contacts.validation.message.max'),
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'contact')
                ->withInput()
                ->with('open_contact_modal', true);
        }

        $validated = $validator->validated();

        ContactMessage::create($validated);

        return back()->with('status', t('contacts.success.saved'))->with('open_contact_modal', true);
    }
}
