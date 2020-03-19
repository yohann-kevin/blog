<?php

function register(){
    global $bdd;

    extract($_POST);

    $validation = true;

    $errors = [];

    if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)){
        $validation = false;
        $errors[] = 'Tous les champs sont obligatoires !!!'; 
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validation = false;
        $errors[] = 'Adresse Email non valide !!!';
    }
    
    if($emailconf != $email){
        $validation = false;
        $errors[] = 'adresse email de confirmation est incorrecte !!!';
    }

    if($passwordconf != $password){
        $validation = false;
        $errors[] = 'le mot de passe de confirmation est incorrect !!!';
    }

    if(pseudoCheck($pseudo)){
        $validation = false;
        $errors[] = 'Ce pseudo est déjà pris !';
    }

    if($validation){
        $register = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
        $register->execute([
            'pseudo' => htmlentities($pseudo),
            'email' => htmlentities($email),
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        
    unset($_POST['pseudo']);
    unset($_POST['email']);
    unset($_POST['emailconf']);

    }

    return $errors;
    
}

function pseudoCheck($pseudo){
    global $bdd;

    $results = $bdd->prepare('SELECT COUNT(*) FROM users WHERE pseudo = ? ');
    $results->execute([$pseudo]);

    $results = $results->fetch()[0];

    return $results;
}

function login(){
    global $bdd;

    extract($_POST);

    $error = 'Les identifiants ne correspondent pas à nos enregistrements !';

    $login = $bdd->prepare('SELECT id, password FROM users WHERE pseudo = ?');

    $login->execute([$pseudo]);

    $login = $login->fetch();

    if(password_verify($password, $login['password'])){
        $_SESSION['user'] = $login['id'];
        header('Location: compte.php');
    }else{
        return $error;
    }
}

function logout(){
    unset($_SESSION['user']);

    session_destroy();

    header('Location: index.php');
}

function infos(){
    global $bdd;

    $infos = $bdd->prepare('SELECT email, pseudo FROM users WHERE id = ?');

    $infos->execute([$_SESSION['user']]);

    $infos = $infos->fetch();

    return $infos;
}

function commentsUsers(){
    global $bdd;

    $comments = $bdd->prepare('SELECT comment.*, articles.title FROM comment INNER JOIN articles ON comment.articles_id = articles.id AND comment.users_id = ?');

    $comments->execute([$_SESSION['user']]);

    $comments = $comments->fetchAll();

    return $comments;
}

function postCom(){
    if(isset($_SESSION['user'])){
        global $bdd;

        extract($_POST);

        $error = '';

        if(!empty($commentaire)){
            $id_article = (int)$_GET['id'];

            $comment = $bdd->prepare('INSERT INTO comment(users_id, articles_id, content) VALUES (:users_id, :articles_id, :content)');

            $comment->execute([
                'users_id' => $_SESSION['user'],
                'articles_id' => $id_article,
                'content' => nl2br(htmlentities($commentaire)),
            ]);
            header('Location: article.php?id='. $id_article);
        }else{
            $error .= 'Vous devez écrire du texte !';
        }
        return $error;
    }
}