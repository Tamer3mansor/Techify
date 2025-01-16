<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contatc;
use Illuminate\Http\Request;

class ContatcController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validInputs = "hi";
        $validInputs = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        // dd($validInputs);

        // Create a new contact entry
        Contatc::create($validInputs);

        // Return with success message
        return back()->with('contact_status', 'Your message was sent successfully.');
    }
}
