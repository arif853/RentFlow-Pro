<!DOCTYPE html>
<html>
<head>
    <title>Client Total Collection Report</title>
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
    <h3>Client Report ({{$customerName}})</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Asset</th>
                <th scope="col">Month</th>
                <th scope="col">Collectable Amount</th>
                <th scope="col">Collection Amount</th>
                <th scope="col">Due</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalCollectableAmount = 0;
                $totalCollectionAmount = 0;
                $totalDueAmount = 0;
            @endphp
            @foreach ($collections as $index => $collection)
            <tr>
                <th scope="row">{{$index + 1}}</th>
                <td>{{$collection->asset->unit_name}}</td>
                <td>{{$collection->month}}</td>
                <td>{{number_format($collection->payable_amount, 2)}}</td>
                <td>{{number_format($collection->collection_amount, 2)}}</td>
                <td>{{number_format($collection->due_amount, 2)}}</td>
            </tr>
            @php
                $totalCollectableAmount += $collection->payable_amount;
                $totalCollectionAmount += $collection->collection_amount;
                $totalDueAmount += $collection->due_amount;
            @endphp
            @endforeach
            <!-- Display totals in the last row -->
            <tr class="total-row">
                <td colspan="3" class="text-right">Total</td>
                <td>{{number_format($totalCollectableAmount, 2)}}</td>
                <td>{{number_format($totalCollectionAmount, 2)}}</td>
                <td>{{ number_format($totalDueAmount, 2) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
