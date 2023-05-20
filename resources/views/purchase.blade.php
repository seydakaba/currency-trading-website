<!DOCTYPE html>
<html>
<head>
    <title>Döviz Satın Alma Formu</title>
</head>
<body>
    <div>
        @include('menu')
    </div>
    <div class="container mt-4">
        <h1>Döviz Satın Alma Formu</h1>
        <form method="POST" action="{{ route('currency-purchase') }}" id="currency-purchase-form">
            @csrf
            <table>
                <tr>
                    <td><label for="account_id">Hesap Seçin:</label></td>
                    <td>
                        <select name="account_id" id="account_id">
                            @foreach($accounts as $account)
                                <option value="{{ $account->account_id }}">{{ $account->currency }} Hesabı (Bakiye: {{ $account->balance }})</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="currency">Satın Alınacak Döviz:</label></td>
                    <td>
                        <select name="currency" id="currency">
                            @foreach($exchangeRates as $exchangeRate)
                                <option value="{{ $exchangeRate->currency }}">{{ $exchangeRate->currency }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="amount">Miktar:</label></td>
                    <td><input type="number" step="0.01" name="amount" id="amount"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Satın Al</button>
                    </td>
                </tr>
            </table>
        </form>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error1'))
        <div class="alert alert-danger">
            {{ session('error1') }}
        </div>
    @endif
    @if (session('error2'))
        <div class="alert alert-danger">
            {{ session('error2') }}
        </div>
    @endif
    </div>    
 
</body>
</html>


