<!DOCTYPE html>
<html>
<head>
    <title>Booking Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .head{
            text-align: center;
            line-height: 5px;
        }
        .phead{
            font-size: 13px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="head">
        <h1>Rental</h1>
        <p class="phead">Address: Hello this is address</p>
        <p class="phead">Phone: 0175454655</p>
    </div>
    <h3>Booking Report</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Asset</th>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>Monthly Rent</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->building->building_name }}</td>
                    <td>{{ $booking->floor->floor_name }}</td>
                    <td>{{ $booking->asset->unit_name }}</td>
                    <td>{{ $booking->customer->client_name }}</td>
                    <td>{{ $booking->customer->client_phone }}</td>
                    <td>{{ $booking->asset->monthly_rent }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
