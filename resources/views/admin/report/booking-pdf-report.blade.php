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
            border: 1px solid #0000005b;
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
            font-size: 12px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="logo" style="position: fixed; left:0; top:-30px; padding:20px;">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $company->logo))) }}"
        alt="Company Logo" style="width: 80px;">
    </div>
    <div class="head">

        <h2>{{$company->company_name}}</h2>
        <p class="phead" style="font-size: 10px;">{{$company->phone_number}} | {{$company->email}}</p>
        <p class="phead" style="font-size: 10px;">{{$company->address}}</p>
    </div>
    <h3 style="text-align: center; padding:10px 0;">Booking Report</h3>
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
                <th>Advance</th>
                <th>Adjustable</th>
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
                    <td>{{ $booking->customer->customerInfo->advance_amount_type == "Yes" ? $booking->customer->customerInfo->advance_amount : 0 }}</td>
                    <td>{{ $booking->customer->customerInfo->adjustable_amout_type == "Yes" ? $booking->customer->customerInfo->adjustable_amount : 0 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
