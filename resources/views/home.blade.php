<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
</head>
<body>
    <div>
        @include('menu')
    </div>
    <form method="POST" action="{{ route('convertCurrency') }}">
        @csrf
        <div class="mb-3">
          <label for="amount" class="form-label">Amount:</label>
          <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="from_currency" class="form-label">From Currency:</label>
          <select name="from_currency" id="from_currency" class="form-select" required>
            <?php 
              use Illuminate\Support\Facades\DB;
              $exchangeRates = DB::table('exchange_rates')->get();
              ?>
            @foreach ($exchangeRates as $exc )           
              <option  value="{{ $exc->currency }}">{{ $exc->currency }}</option>
            @endforeach
           </select>
        </div>
        <div class="mb-3">
          <label for="to_currency" class="form-label">To Currency:</label>
          <select name="to_currency" id="to_currency" class="form-select" required>
            @foreach ($exchangeRates as $exc )
              <option value="{{ $exc->currency }}">{{ $exc->currency }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Convert</button>
      </form>
      @isset($result){

        {{ $result }}
      }
      @endisset
</body>
</html>