<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warp Code - Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <a href="index.php">Blog</a>
                </div>
                <div class="col-sm-10">
                    <nav>
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <?php
                            if(isset($_SESSION['user'])) :
                            ?>
                            <li><a href="compte.php">Mon compte</a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                            <?php
                            else :
                            ?>
                            <li><a href="connexion.php">Connexion</a></li>
                            <li><a href="inscription.php">Inscription</a></li>
                            <?php
                            endif
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>