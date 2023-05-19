<!DOCTYPE html>
<html>
<head>
	<title>Döviz Satın Alma Formu</title>
</head>
<body>
	<h1>Döviz Satın Alma Formu</h1>
	<form method="POST" action="{{ route('buyCurrency') }}">
		@csrf
        @method('POST') 
		<label for="account_id">Hesap Seçin:</label>
		<select name="account_id" id="account_id">
			@foreach($accounts as $account)
				<option value="{{ $account->id }}">{{ $account->currency }} Hesabı (Bakiye: {{ $account->balance }})</option>
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
</body>
</html>

