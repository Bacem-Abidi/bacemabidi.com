<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('pages.frontend.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            // Send email
            Mail::to(config('mail.from.address'))->send(new ContactFormMail($validated));

            return back()->with('success', 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return back()
                ->withInput()  // Preserve user input
                ->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
