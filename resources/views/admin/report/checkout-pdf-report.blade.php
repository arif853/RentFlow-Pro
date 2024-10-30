<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Report</title>
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
            font-size: 12px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="head">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $company->logo))) }}" alt="Company Logo" style="width: 140px; margin-bottom: 10px;">
        <h2>{{$company->company_name}}</h2>
        <p class="phead">Phone: {{$company->phone_number}}</p>
        <p class="phead">Email: {{$company->email}}</p>
        <p class="phead">Address: {{$company->address}}</p>
    </div>
    <h3>Checkout Report</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Building</th>
                <th>Unit Name</th>
                <th>Asset Code</th>
                <th>Client Name</th>
                <th>Phone Number</th>
                <th>Checkout Month</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checkouts as $index => $checkout)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $checkout->building->building_name }}</td>
                <td>{{ $checkout->asset->unit_name }}</td>
                <td>{{ $checkout->asset->asset_code }}</td>
                <td>{{ $checkout->customer->client_name }}</td>
                <td>{{ $checkout->customer->client_phone }}</td>
                <td>{{ $checkout->month }}</td>
                <td>{{ $checkout->is_confirm == 1 ? 'Confirmed' : 'Pending' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
