@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h3>Create New Ticket</h3>

        <form action="/tickets" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </form>
    </div>
</div>
@endsection
