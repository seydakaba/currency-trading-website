<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haberler</title>
</head>
<body>
    <div>
        @include('menu')
    </div>
    <div class="container ">
    <ul style="list-style: none;">
        <?php foreach($data['item'] as $item): ?>
            <div class="news-item m-3">
                <div class="card">
                    <div class="card-body">
                        <li>
                        <h3><a href="<?= $item['link'] ?>"><?= $item['title'] ?></a></h3>
                        <p><?= $item['description'] ?></p>
                        <span><?= $item['pubDate'] ?></span>
                        </li>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </ul>
    </div>

</body>
</html>
