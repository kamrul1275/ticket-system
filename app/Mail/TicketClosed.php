<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketClosed extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket; // Pass the ticket object to the view
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('tickets.closeMail') // Email view
                    ->subject('Your Ticket has been Closed')
                    ->with('ticket', $this->ticket); // Pass the ticket data
    }
}
