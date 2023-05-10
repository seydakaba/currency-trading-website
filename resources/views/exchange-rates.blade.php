<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @include('menu')
    </div>
    <div class="container mt-5">
        <table class="table-hover">
            <thead>
                <tr>
                    <th class="p-3">Currency</th>
                    <th class="p-3">Rate</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($exchangeRates as $exchangeRate)
                    <tr>
                        <td class="p-3">{{ $exchangeRate->currency }}</td>
                        <td class="p-3">{{ $exchangeRate->rate }}</td>
                        <td colspan="2" class=""><button type="button" class="btn btn-success">Buy</button>
                            <button type="button" class="btn btn-danger">Sell</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
