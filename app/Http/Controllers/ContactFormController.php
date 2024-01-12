<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\SimpleData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function contactPost(ContactFormRequest $request)
    {
        $validated = $request->validated();

        Mail::send(
            'email',
            [
                'name' => $validated['contact_name'],
                'email' => $validated['contact_email'],
                'contact_message' => $validated['contact_message'],
            ],
            function ($message) use ($validated) {
                $name = env('APP_NAME');
                $email = env('MAIL_FROM_ADDRESS');

                $message->from($email)
                    ->replyTo($validated['contact_email'], $validated['contact_name'])
                    ->to($email, $name)
                    ->subject('Nowa wiadomość z formularza kontaktowego pizzarella.pl');
            }
        );

        return redirect()->route('kontakt')->with('contact_success', 'Wiadomość została wysłana');
    }
}
