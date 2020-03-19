<?php
    require_once '../fonction/bdd.php';
    include_once '../fonction/admin.php';
    $bdd = bdd();
    delete();

    header('Location: posts.php');