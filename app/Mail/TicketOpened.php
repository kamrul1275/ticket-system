<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketOpened extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket; // Add this

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket) // Accept Ticket object in constructor
    {
        $this->ticket = $ticket; // Assign ticket to public property
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('tickets.openMail')
                    ->with('ticket', $this->ticket); // Pass the ticket to the view
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
