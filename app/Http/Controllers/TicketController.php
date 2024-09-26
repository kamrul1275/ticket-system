<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  // For handling HTTP requests
use App\Models\Ticket;        // The Ticket model
use Illuminate\Support\Facades\Mail;  // For sending emails
use App\Mail\TicketOpened;    // The mailable for ticket opened notification
use App\Mail\TicketClosed;    // The mailable for ticket closed notification
use Illuminate\Support\Facades\Gate;  // For authorization
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TicketController extends Controller
{

    use AuthorizesRequests;
    public function index()
    {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'You need to log in to access tickets.');
        }
    
        // Now it's safe to access the role
        $tickets = auth()->user()->role == 'admin' ? Ticket::all() : Ticket::where('user_id', auth()->id())->get();
    
        return view('tickets.index', compact('tickets'));
    }
    
    
    
    public function create()
    {
        return view('tickets.create');
    }
    
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'description' => $request->description,
        ]);
        
        // Notify admin
        Mail::to('support@example.com')->send(new TicketOpened($ticket));
        return redirect('/')->with('success', 'Ticket created successfully');
    }
    
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        return view('tickets.show', compact('ticket'));
    }
    



    public function respond(Ticket $ticket, Request $request)
    {
        // Add response logic here
    }
    
    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);
        
        // Notify customer
        Mail::to($ticket->user->email)->send(new TicketClosed($ticket));
        return redirect('/')->with('success', 'Ticket closed successfully');
    }
    
}
