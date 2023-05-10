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
    <?php 
      use Illuminate\Support\Facades\DB;
      $exchangeRates = DB::table('exchange_rates')->get();
    ?>
    <div class="container mt-4 d-flex justify-content-between">
      <div>
        <table class="table-hover">
          <thead>
              <tr>
                  <th class="p-3">Currency</th>
                  <th class="p-3">Rate</th>
              </tr>
          </thead>
          <tbody>
              @foreach($exchangeRates as $exchangeRate)
                  <tr>
                      <td class="p-3">{{ $exchangeRate->currency }}</td>
                      <td class="p-3">{{ $exchangeRate->rate }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      </div>

      <div class="card" style="width: 350px;">
          <div class="card-body">
              <h5 class="card-title">Para Dönüştürme</h5>
              <form method="POST" action="{{ route('convertCurrency') }}">
                  @csrf
                  <div class="mb-3 d-flex">
                      <label for="amount" class="form-label mr-3">Amount:</label>
                      <input style="width: 150px;" type="number" min="1" name="amount" id="amount" class="form-control" required>
                  </div>
                  <div class="mb-3">
                      <label for="from_currency" class="form-label mr-3">From Currency:</label>
                      <select name="from_currency" style="width: 150px;" id="from_currency" class="form-select" required>
                          
                          @foreach ($exchangeRates as $exc )           
                              <option value="{{ $exc->currency }}">{{ $exc->currency }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="to_currency" class="form-label mr-3">To Currency:</label>
                      <select name="to_currency" style="width: 150px;" id="to_currency" class="form-select" required>
                          @foreach ($exchangeRates as $exc )
                              <option value="{{ $exc->currency }}">{{ $exc->currency }}</option>
                          @endforeach
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Convert</button>
              </form>
              @isset($result)
              <div class="mt-4">
                  <p class="font-weight-bold">Result:</p>
                  <p class="lead">{{ $result }}</p>
              </div>
              @endisset
          </div>
      </div>
  </div>
  
</body>
</html>