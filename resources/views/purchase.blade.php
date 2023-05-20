<!DOCTYPE html>
<html>
<head>
    <title>Döviz Satın Alma Formu</title>
</head>
<body>
    <div>
        @include('menu')
    </div>
    <h1>Döviz Satın Alma Formu</h1>
    <form method="POST" action="{{ route('currency-purchase') }}" id="currency-purchase-form">
        @csrf
        <label for="account_id">Hesap Seçin:</label>
        <select name="account_id" id="account_id">
            @foreach($accounts as $account)
                <option value="{{ $account->account_id }}">{{ $account->currency }} Hesabı (Bakiye: {{ $account->balance }})</option>
            @endforeach
        </select>
        <br><br>
        <label for="currency">Satın Alınacak Döviz:</label>
        <select name="currency" id="currency">
            @foreach($exchangeRates as $exchangeRate)
                <option value="{{ $exchangeRate->currency }}">{{ $exchangeRate->currency }}</option>
            @endforeach
        </select>
        <br><br>
        <label for="amount">Miktar:</label>
        <input type="number" step="0.01" name="amount" id="amount">
        <br><br>
        <button type="submit">Satın Al</button>
    
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
</body>
</html>


