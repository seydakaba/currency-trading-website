<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload balance</title>
</head>
<body>
    <div>
        @include('menu') 
    </div>
    <div class="container">
        <form action="{{ route('uploadBalance') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="kart_id">Kart Seçin:</label>
                <select name="kart_id" id="kart_id" class="form-control">
                    @foreach($cards as $card)
                        <option value="{{ $card->CardID }}">{{ $card->CardNumber }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="yukleme_miktari">Yükleme Miktarı:</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="number" name="yukleme_miktari" id="yukleme_miktari" class="form-control" min='1'>
            </div>
            
                <button type="submit" class="btn btn-primary">Bakiye Yükle</button>
        </form>
    </div>
</body>
</html>