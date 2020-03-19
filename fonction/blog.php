<?php

//recupere article
function articles(){
    global $bdd;

    $articles = $bdd->query('SELECT id,extract,title,image,created_date FROM articles');
    $articles = $articles->fetchAll();
    

    return $articles;
}

//met en forme la date
function thisIsTheFuckingDate($publication){
    // $publication = explode(" ", $publication);
    // $date = explode("-",$publication[0]);
    // $hour = explode(":",$publication[1]);
    // $months = ['','janvier' , 'fevrier' ,'mars' ,'avril' ,'mai'
    //             ,'juin' ,'juillet', 'aout' ,'septembre' , 'octobre' , 'novembre' , 'decembre'];
    
    // $results = $date[2] . " " . $months[(int)$date[1]] . " " . $date[0] . " à " . $hour[0] . "H" . $hour[1];
    setlocale(LC_TIME,"fr_FR.utf-8");
    $results = strftime("%A %d %B %G", strtotime($publication));

    return $results;
}

function article(){
    global $bdd;

    $id = (int)$_GET['id'];

    $article = $bdd->prepare('SELECT id, title, content, image, created_date FROM articles WHERE id=?');

    $article->execute([$id]);

    $article = $article->fetch();

    if(empty($article)){
        // header('Location: index.php');
        header("HTTP/1.0 404 Not Found");
        exit( 0 );
    }else{
        return $article;
    }
}

function numbComment(){
    global $bdd;

    $id_article = (int)$_GET['id'];

    $nb = $bdd->prepare('SELECT Count(*) FROM comment WHERE articles_id=?');

    $nb->execute([$id_article]);

    $nb = $nb->fetch()[0];

    return $nb;
}

function getComments(){
    global $bdd;

    $id_article = (int)$_GET['id'];

    $comments = $bdd->prepare('SELECT comment.*, users.pseudo FROM comment INNER JOIN users ON comment.users_id = users.id AND comment.articles_id = ?');

    $comments->execute([$id_article]);

    $comments = $comments->fetchAll();

    return $comments;
}

function search(){
    global $bdd;

    extract($_POST);

    $search = $bdd->prepare('SELECT * FROM articles WHERE title LIKE :plop OR extract LIKE :plop OR content LIKE :plop');

    $search->execute([
        'plop' => '%'. $plop . '%'
    ]);

    $search = $search->fetchAll();

    return $search;
}