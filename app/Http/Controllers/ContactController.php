<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; 

class ContactController extends Controller
{
    public function submit(Request $request)
{
    try {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email',
            'message'    => 'required|string',
        ]);

        // Membuat kontak baru
        $contact = Contact::create($validated);

        // Mengirim email
        Mail::to('shimen0305@gmail.com')->send(new ContactFormSubmitted($contact));

        return response()->json(['message' => 'Pesan berhasil dikirim!']);
    } catch (\Exception $e) {
        Log::error('Email error: '.$e->getMessage());
        return response()->json([
            'message' => 'Gagal mengirim pesan: '.$e->getMessage()
        ], 500);
    }
}

}