<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Mail\Mailgun;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public $subject, $greeting, $body, $closing;
    
    public function index()
    {
        return view('users.index', compact('subject', 'greeting', 'body', 'closing'));
    }

    public function store(Request $request)
    {
        $owners = Owner::all();
        $subject = $request->subject;
        $greeting = $request->greeting;
        $body = $request->body;
        $closing = $request->closing;

        $email = new Mailgun($subject, $greeting, $body, $closing);

        foreach($owners as $index => $owner){
            $multiplicador = $index + 1;
            $when = now()->addSeconds($multiplicador * 5);
            Mail::to($owner)->later($when, $email);
        }

        return redirect()->route('mail.index')->with('success', true);
    
    }
}
