<?php
    session_start();
    require_once 'fonction/bdd.php';
    include_once 'fonction/blog.php';
    $bdd = bdd();
    if(!empty($_POST)){
        $articles = search();
    }else{
        $articles = articles();
    }
    include_once 'layouts/header.php';
?>
<div class="container article">
    <div class="row">
        <form method="post" action="index.php">
            <div class="col-sm-10">
                <input type="search" name="plop" placeholder="Rechercher un article ..." value="<?php if(isset($_POST['plop']))echo $_POST['plop'] ?>">
            </div>
            <div class="col-sm-2">
                <input type="submit" value="OK!">
            </div>
        </form>
    </div>

    <?php if(isset($_POST['plop'])) : ?>
        <div class="row">
            <div class="col-xs-12">
                <h1>Resultat de ma recherche " <?= $_POST['plop'] ?> "</h1>
            </div>
        </div>

    <?php endif ?>

    <div class="row">
        <?php foreach ($articles as $article): ?>

        <div class="col-md-4 col-sm-6">
            <article>
                <img src="img/<?= $article['image'] ?>" alt="https://placeimg.com/640/480/people">
                <p class="date">Posté le <time datetime="2015-10-20 20:29"><?= thisIsTheFuckingDate($article['created_date'])?></time>
                </p>
                <h1><?= $article['title']?></h1>
                <p><?=$article['extract']?></p>
                <a href="article.php?id=<?=$article['id'] ?>">Lire l'article</a>
            </article>
        </div>

        <?php endforeach ?>

    </div>
    <?php
        include_once 'layouts/footer.php';
    ?>