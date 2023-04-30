<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giris Yap</title>
</head>
<body>
    <div>
        @include('menu');
    </div> 
    
    <div class="container" style="width: 30rem;" >
        <form method="POST" action="{{ route('access') }}">
            @csrf

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"> Email </label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="e_posta" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end"> Şifre </label>

                <div class="col-md-6">
                    <input id="sifre" type="password" class="form-control @error('password') is-invalid @enderror" name="sifre" required autocomplete="current-password">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                        <label class="form-check-label" for="remember">
                            {{ __('Beni Hatırla') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Giriş Yap
                    </button>

                    @if (Route::has('sifremiUnuttum'))
                        <a class="btn btn-link" href="">
                            {{ __('Şifremi Unuttum') }}
                        </a>
                    @endif
                </div>
            </div>

        </form>
    </div>

</body>
</html>