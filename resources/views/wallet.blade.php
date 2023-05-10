<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @include('menu')
    </div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bakiye Bilgisi</h5>
                <div class="row">
                    <div class="col-sm-6 d-flex">
                        <p class="card-text font-weight-bold mr-3">{{ $balance->balance }}</p>
                        <p class="card-text">{{ $balance->currency }}</p>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="btn btn-primary float-right">Bakiye Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>