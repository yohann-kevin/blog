<?php 
    session_start();
    require_once 'fonction/bdd.php';
    include_once 'fonction/users.php';
    include_once 'fonction/blog.php';
    $bdd = bdd();
    $article = article();
    $nb = numbComment();
    $comments = getComments();
    if(!empty($_POST)){
        $error = postCom();
    }
    include_once 'layouts/header.php';
?>
<div class="container article">
    <div class="row">
        <form method="post" action="">
            <div class="col-sm-10">
                <input type="text" name="query" placeholder="Rechercher un article ...">
            </div>
            <div class="col-sm-2">
                <input type="submit" value="OK!">
            </div>
        </form>
    </div>
    <div class="row">
        <article>
            <div class="col-sm-5">
                <img src="img/<?= $article['image'] ?>" title="<?= $article['title'] ?>" alt="<?= $article['title'] ?>">
            </div>
            <div class="col-sm-7">
                <p class="date">Posté le <time
                        datetime="2015-10-20 20:29"><?= thisIsTheFuckingDate($article['created_date'])?></time></p>
                <h1><?= $article['title']?></h1>
                <p><?=$article['content']?></p>
            </div>
        </article>
    </div>
</div>
<div class="container commentaires">
    <div class="row">
        <div class="col-xs-12">
            <h1>Commentaires (<?= $nb ?>)</h1>
        </div>
    </div>
    <?php foreach($comments as $comment) : ?>
    <div class="row commentaire">
        <div class="col-xs-12">
            <p class="date">Posté par <?= $comment['pseudo'] ?> le <time
                    datetime="<?= $comment['created_date'] ?>"><?= thisIsTheFuckingDate($comment['created_date']) ?></time>
                :
            </p>
            <p><?= $comment['content'] ?></p>
        </div>
    </div>
    <?php 
    endforeach ;
    if(isset($_SESSION['user'])) :
    ?>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="">
            <?php 
            if(isset($error)) :
                if($error) :
            ?>
                <div class="row">
                        <div class="col-xs-12">
                            <div class="message erreur"><?= $error ?></div>
                        </div>
                    </div>
                    <?php
                    else :
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message confirmation">Votre commentaire a bien été envoyer !</div>
                        </div>
                    </div>
                    <?php
                    endif;
                    endif
                    ?>
                <textarea name="commentaire" placeholder="Votre commentaire *"></textarea>
                <input type="submit" value="Commenter">
            </form>
        </div>
    </div>
    <?php
    endif ;
    include_once 'layouts/footer.php'
    ?>