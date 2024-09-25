@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <h4>Ticket #{{ $ticket->id }}: {{ $ticket->subject }}</h4>
        <span class="badge {{ $ticket->status == 'open' ? 'bg-success' : 'bg-secondary' }}">
            {{ ucfirst($ticket->status) }}
        </span>
    </div>
    <div class="card-body">
        <p>{{ $ticket->description }}</p>
        <p><strong>Submitted by:</strong> {{ $ticket->user->name }}</p>
    </div>
</div>

@if(auth()->user()->role == 'admin' && $ticket->status == 'open')
<div class="card">
    <div class="card-header">
        <h5>Respond to Ticket</h5>
    </div>
    <div class="card-body">
        <form action="/tickets/{{ $ticket->id }}/response" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="response" class="form-control" rows="4" placeholder="Write your response here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Response</button>
        </form>
    </div>
</div>
@endif
@endsection
