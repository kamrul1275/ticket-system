@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Tickets</h3>
    <a href="/tickets/create" class="btn btn-primary">Create New Ticket</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Ticket ID</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->subject }}</td>
            <td>
                <span class="badge {{ $ticket->status == 'open' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </td>
            <td>
                <a href="/tickets/{{ $ticket->id }}" class="btn btn-info btn-sm">View</a>
                @if(auth()->user()->role == 'admin' && $ticket->status == 'open')
                    <form action="/tickets/{{ $ticket->id }}/close" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">Close</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
