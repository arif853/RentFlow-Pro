<!DOCTYPE html>
<html>
<head>
    <title>Month Wise Total Collection Report</title>
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
    <h3>Month Wise Report ({{$formattedMonth}})</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Client</th>
                <th scope="col">Building</th>
                <th scope="col">Asset</th>
                <th scope="col">Collectable Amount</th>
                <th scope="col">Collection Amount</th>
                <th scope="col">Due</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $index => $collection)
            <tr>
                <th scope="row">{{$index + 1}}</th>
                <td>{{$collection->collection_date}}</td>
                <td>{{$collection->customer->client_name}}</td>
                <td>{{$collection->building->building_name}}</td>
                <td>{{$collection->asset->unit_name}}</td>
                <td>{{$collection->payable_amount}}</td>
                <td>{{$collection->collection_amount}}</td>
                <td>{{$collection->due_amount}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
