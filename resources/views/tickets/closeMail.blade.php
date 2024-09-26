<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket close</title>
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
            <h1>Ticket Close</h1>
        </div>
       
        <h2>Close Successfully</h2>


            <p>Hello {{ $ticket->user->name ?? 'Customer' }},</p>

            <p>We wanted to inform you that your ticket with the subject "<strong>{{ $ticket->subject }}</strong>" has been closed.</p>

            <p><strong>Ticket Details:</strong></p>
            <p>Subject: {{ $ticket->subject }}</p>
            <p>Description: {{ $ticket->description }}</p>
            <p>Status: Closed</p>

            <p>If you have any further issues, feel free to open a new ticket.</p>

            <p>Thank you,<br>The Support Team</p>

    </div>
</body>
</html>
