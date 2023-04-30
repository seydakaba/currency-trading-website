<!DOCTYPE html>
<HTML>
<table>
    <thead>
        <tr>
            <th>Currency</th>
            <th>Rate</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exchangeRates as $exchangeRate)
            <tr>
                <td>{{ $exchangeRate->currency }}</td>
                <td>{{ $exchangeRate->rate }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</HTML>
