<h1>All news page</h1>
<?php foreach ($newsList as $news): ?>

<div>
    //news.show -> имя роута
    <h4><a href="<?=route('news.show', ['id' => $news['id']])?>"><?=$news['title']?></a></h4>
    <br>
    <img src="<?=$news['image']?>" alt="image"/>
    <p>автор:<?=$news['author']?></p>
    <p>время:<?=$news['created_at']?></p>
    <p><?=$news['description']?></p>
</div>
<hr>
<br>
<?php endforeach;
