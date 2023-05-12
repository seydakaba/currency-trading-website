<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haberler</title>
</head>
<body>
    <ul>
        <?php foreach($data['item'] as $item): ?>
            <li>
                <h3><a href="<?= $item['link'] ?>"><?= $item['title'] ?></a></h3>
                <p><?= $item['description'] ?></p>
                <span><?= $item['pubDate'] ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
