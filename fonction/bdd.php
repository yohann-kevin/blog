<?php

function bdd(){
    $data='mysql:dbname=blog;host=127.0.0.1';
    $user='root';
    $password='';

    try {
        $bdd=new PDO($data, $user, $password);
    }

    catch (PDOException $e) {
        echo 'Connexion échouée : '. $e->getMessage();
    }

    return $bdd;
}

