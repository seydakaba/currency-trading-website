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

    <div class="container ">
        @foreach($news as $item)
        <div class="news-item m-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>

                    <a href="{{ $item->link }}" class="btn btn-primary" target="_blank">Habere Git</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</body>
</html>
