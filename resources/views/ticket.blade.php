<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ticket PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10mm 5mm;
        }
        .ticket {
            border: 1px solid #333;
            padding: 10px;
            width: 200px;
        }
        .ticket-header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 5px;
        }
        .ticket-body {
            padding: 10px;
        }
    </style>
</head>
<body>

    <div class="ticket">
        <div class="ticket-header">
            <h2>Ticket Information</h2>
        </div>
        <div class="ticket-body">
            <p><strong>Event:</strong> {{ $reservation->footballMatch->team1->name }} VS {{$reservation->footballMatch->team2->name}}</p>
            <p><strong>User:</strong> {{ $reservation->user->name }}</p>
            <p><strong>Date:</strong> {{ now()->format('Y-m-d H:i:s') }}</p>
            <!-- Add more details as needed -->
        </div>
    </div>

</body>
</html>
