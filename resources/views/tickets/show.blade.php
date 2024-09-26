@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ticket Details</h2>
    <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Status:</strong> {{ $ticket->status }}</p>
    <p><strong>Opened by:</strong> {{ $ticket->user->name }}</p>
    <p><strong>Created at:</strong> {{ $ticket->created_at }}</p>
    
    <!-- You might want to include a close ticket button here -->
    @if($ticket->status !== 'closed')
        <form action="{{ route('tickets.close', $ticket->id) }}" method="POST">
            @csrf
            @method('POST') <!-- or PATCH depending on your route -->
            <button type="submit" class="btn btn-danger">Close Ticket</button>
        </form>
    @endif
</div>
@endsection
