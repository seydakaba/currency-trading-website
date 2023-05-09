<?php 
use Illuminate\Support\Facades\DB;
$users = DB::table('credit_cards')->where('userID',session('id'))->get();

?>
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

    <section class="p-4 p-md-5" style="
    background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background3.webp);">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-5">
      <div class="card rounded-3">
        <div class="card-body p-4">
          <div class="text-center mb-4">
            <h3>Settings</h3>
            <h6>Payment</h6>
          </div>
          <form action="{{ route('addCard') }}" method="POST">
            @csrf
            <p class="fw-bold mb-4 pb-2">Saved cards:</p>
            
              
          @foreach ($users as $user )
            
              <table>
              
              <tr>
              <img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
              <div class="flex-fill mx-3">
                <div class="form-outline">
                  <input type="text" id="formControlLgXc" class="form-control form-control-lg"
                    value="{{ $user->CardNumber }}" />
                  <label class="form-label" for="formControlLgXc">Card Number</label>
                </div>
              </div>
              <a href="#!">Remove card</a> <br>
            </tr>
               @endforeach
              </table>
           

           

            <p class="fw-bold mb-4">Yeni Kredi Kartı Ekle:</p>

            <div class="form-outline mb-4">
              <input type="text" id="CardholderName" name="CardholderName" class="form-control form-control-lg"
                value="{{ session('adi')}} {{ session('soyadi') }}" />
              <label class="form-label" for="CardholderName">Kart Sahibinin Adı</label>
            </div>

            <div class="row mb-4">
              <div class="col-7">
                <div class="form-outline">
                  <input type="text" id="CardNumber" name="CardNumber" class="form-control form-control-lg"
                    placeholder="1234 5678 1234 5678" />
                  <label class="form-label" for="CardNumber">Kart Numarası</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-outline">
                  <input type="MM/YYYY" id="ExpirationDate" name="ExpirationDate" class="form-control form-control-lg"
                    placeholder="MM/YYYY" />
                  <label class="form-label" for="ExpirationDate">Expire</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-outline">
                  <input type="text" id="SecurityCode" name="SecurityCode" class="form-control form-control-lg"
                    placeholder="Cvv" />
                  <label class="form-label" for="SecurityCode">Cvv</label>
                </div>
              </div>
            </div>

            <button class="btn btn-success btn-lg btn-block">Add card</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>