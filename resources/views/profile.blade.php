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
        @include('menu');
    </div>

   
    <div class="container ">
        <div class="row justify-content-center" id="profile_view" style="display:block;>
            <div class="col-md-8">
                <div class="card">
                    @foreach ($UserInformation as $UserInfo )
                        
                    
                    <div class="card-header">Kullanıcı Bilgileri</div>
                    <br>
                    
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('İsim') }}</label>
    
                            <div class="col-md-6">
                                <label for="name" class="col-md ">{{ $UserInfo->first_name }}</label>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Soyadı') }}</label>
    
                            <div class="col-md-6">
                                <label for="name" class="col-md">{{ $UserInfo->last_name }}</label>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pass" class="col-md-4 col-form-label text-md-right">{{ __('Şifresi') }}</label>
    
                            <div class="col-md-6">
                                <label for="name" class="col-md" value="">*************</label>

                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Posta Adresi') }}</label>
    
                            <div class="col-md-6">
                                <label for="name" class=" col-md">{{ $UserInfo->email }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefon Numarası') }}</label>
    
                            <div class="col-md-6">
                                <label for="phone" class=" col-md">{{ $UserInfo->phone_number }}</label>
                            </div>
                        </div>

                        @endforeach
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Geri') }}</a>
                            </div>
                           
                            <div class="col-md-6">
                                <button class="btn btn-primary" onclick="showForm()">Bilgilerimi Düzenle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container">
        <div id="edit-form" style="display:none;"> 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Kullanıcı Bilgileri</div>
                        <br><br>
                        @foreach ($UserInformation as $UserInfo )
                         
                        <form method="POST" action="{{ route('profile.update', ['id' => $UserInfo->id]) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('İsim') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $UserInfo->first_name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Soyadı') }}</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $UserInfo->last_name) }}" required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Şifre') }}</label>
                                <div class="col-md-6">

                                    <input style="display: none" id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $UserInfo->password) }}" required autocomplete="password" autofocus>
                                   <label for="password">********</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $UserInfo->email) }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Telafon Numarası') }}</label>
                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $UserInfo->phone_number) }}" required autocomplete="phone_number" autofocus>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <!-- Düzenlenecek diğer alanlar da buraya eklenebilir -->
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kaydet') }}
                                    </button>
                                    
                                        <a href="" class="btn btn-primary">{{ __('Vazgeç') }}</a>
                                   
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </form>
    
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    
</body>
</html>
<script>
function showForm() {
    
    document.getElementById("profile_view").style.display = "none";
    
    document.getElementById("edit-form").style.display = "block";
  }
  </script>
