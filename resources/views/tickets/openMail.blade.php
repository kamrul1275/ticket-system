<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Opened</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #007bff;
            font-size: 20px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .content a {
            display: inline-block;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>New Ticket Opened</h1>
        </div>
        <div class="content">
            <h2>Ticket Details</h2>
            <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
            <p><strong>Description:</strong> {{ $ticket->description }}</p>
            <p><strong>Opened by:</strong> {{ $ticket->user->name }} ({{ $ticket->user->email }})</p>

            <p>
                A new support ticket has been opened. You can view and respond to the ticket by clicking the button below:
            </p>
            <a href="{{ url('/tickets/' . $ticket->id) }}" target="_blank">View Ticket</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
