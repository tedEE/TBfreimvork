<!doctype html>
<html lang="RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин Грибов</title>
</head>
<body>
<ul> Категории
    <?php foreach ($this->cats as $cat): ?>
    <li>
        <?php echo $cat->rus_name?>
    </li>
    <?php endforeach; ?>
</ul>
    <?php foreach ($this->products as $prod): ?>
    <article>
        <h2>
            <a href="/product/<?php echo $prod->id;?>"><?php echo $prod->rus_name?>
            </a>
        </h2>
        <p><?php echo $prod->descr ?></p>
    </article>
    <hr>
    <?php endforeach; ?>
</body>
</html>