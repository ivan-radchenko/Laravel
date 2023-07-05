<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Current Category Page</h1>
<h2><a href="/">Главная страница</a></h2>
<h2>имя категории:<?=$categories['name']?></h2>
<h2>id категории:<?=$categories['id']?></h2> <br/>
<?php foreach ($newsList as $news):?>
@if($news['category'] == $categories['id'])
    <div>
        <h4><a href="<?=route('news.show', ['id' => $news['id']])?>"><?=$news['title']?></a></h4>
        <br>
        <img src="<?=$news['image']?>" alt="image"/>
        <p>автор:<?=$news['author']?></p>
        <p>время:<?=$news['created_at']?></p>
        <p><?=$news['description']?></p>
    </div>
    <hr>
    <br>
@endif
<?php endforeach;?>
</body>
</html>
