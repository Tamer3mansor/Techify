<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {


        // dd($request);
        $validate_data = $request->validate([
            'subscriber' => 'required|email|unique:subscribers,email'
        ], [
            'subscriber.unique' => 'You Already subscibe befor Thanks!'
        ]);
        Subscriber::create([
            'email' => $validate_data['subscriber'],
        ]);
        return back()->with('status', 'success');

    }
}
