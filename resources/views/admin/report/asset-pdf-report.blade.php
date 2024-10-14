<!DOCTYPE html>
<html>
<head>
    <title>Asset Report</title>
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
        <p class="phead">Address: Hello rthis is adress</p>
        <p class="phead">Phone: 0175454655</p>
    </div>
    <h3>Asset Report</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Unit</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Location</th>
                <th>Available From</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assets as $index => $asset)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><span>Name: {{ $asset->unit_name }}</span> <br> <span>Code: {{ $asset->asset_code }}</span></td>
                    <td>{{ $asset->building->building_name }}</td>
                    <td>{{ $asset->floor->floor_name }}</td>
                    <td>{{ $asset->location->name }}</td>
                    <td>{{ $asset->is_book == 0 ? $asset->available_from ? $asset->available_from : "N/A": 'Booked' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
