<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayit Ol</title>
</head>
<body>
    <div>
        @include('menu');
    </div>

    <div class="container" style="width: 30rem;" >
        <form method="POST" action="">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Ad</label>

                <div class="col-md-6">
                    <input id="adi" type="text" class="form-control @error('name') is-invalid @enderror" name="adi" value="{{ old('Ad:') }}" required autocomplete="adi" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="soyadi" class="col-md-4 col-form-label text-md-end">Soyad</label>

                <div class="col-md-6">
                    <input id="soyadi" type="text" class="form-control @error('soyadi') is-invalid @enderror" name="soyadi" value="{{ old('soyadi') }}" required autocomplete="soyadi" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                <div class="col-md-6">
                    <input id="e_posta" type="email" class="form-control @error('email') is-invalid @enderror" name="e_posta" value="{{ old('email') }}" required autocomplete="email">
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="telefon" class="col-md-4 col-form-label text-md-end">Telefon</label>

                <div class="col-md-6">
                    <input id="telefon" type="text" class="form-control @error('telefon') is-invalid @enderror" name="telefon" value="{{ old('telefon') }}" required autocomplete="telefon" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="sifre" class="col-md-4 col-form-label text-md-end">Şifre</label>

                <div class="col-md-6">
                    <input id="sifre" type="password" class="form-control @error('password') is-invalid @enderror" name="sifre" required autocomplete="sifre">
                </div>
            </div>

            <div class="row mb-3">
                <label for="sifre" class="col-md-4 col-form-label text-md-end">Şifre Tekrarı</label>

                <div class="col-md-6">
                    <input id="sifret" type="password" class="form-control" name="sifret" required autocomplete="sifre">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Kayıt Ol
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>