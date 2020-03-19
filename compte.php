<?php 
    session_start();
    require_once 'fonction/bdd.php';
    include_once 'fonction/users.php';
    include_once 'fonction/blog.php';
    $bdd = bdd();
    $infos = infos();
    $comments = commentsUsers();
    include_once 'layouts/header.php';
?>
    <div class="container commentaires">
        <div class="row">
            <div class="col-xs-12">
                <h1>Bienvenue <?= $infos['pseudo']?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>Adresse e-mail : <?= $infos['email']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1>Derniers commentaires !</h1>
            </div>
        </div>
        <?php
        foreach($comments as $comment) :
        ?>
        <div class="row commentaire">
            <div class="col-xs-12">
                <p class="date">Posté par <?= $infos['pseudo']?> le <time datetime="<?= $comment['created_date']?>"><?= thisIsTheFuckingDate($comment['created_date'])?></time> 
                <?= $comment['title']?>:</p>
                <p><?= $comment['content']?></p>
            </div>
        </div>
        <?php
        endforeach
        ?>
        <?php 
            include_once 'layouts/footer.php'
        ?>