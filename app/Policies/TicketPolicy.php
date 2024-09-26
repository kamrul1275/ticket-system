<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Ticket;

class TicketPolicy
{



    public function view(User $user, Ticket $ticket)
    {
        // Add your logic here. For example, check if the user is the owner or an admin.
        return $user->id === $ticket->user_id || $user->role === 'admin';
    }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}


