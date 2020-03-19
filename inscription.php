<?php 
    session_start();
    require_once 'fonction/bdd.php';
    include_once 'layouts/header.php';
    include_once 'fonction/users.php';
    $bdd = bdd();
    if(!empty($_POST)){
        $errors = register();
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3">
                <h1>Inscription sur Warp Code !</h1>
            </div>
        </div>
        <form method="post" action="">

            <?php
                if(isset($errors)) :
                    if($errors):
                foreach($errors as $error) :
            ?>


            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="message erreur"><?= $error ?></div>
                </div>
            </div>

            <?php endforeach; else : ?>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="message confirmation">Ici j'affiche un message de confirmation !</div>
                </div>
            </div>

            <?php endif; endif ?>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="text" name="pseudo" placeholder="Pseudo *" value='<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>'>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="text" name="email" placeholder="Adresse e-mail *" value='<?php if(isset($_POST['email']))echo $_POST['email'] ?>'>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="text" name="emailconf" placeholder="Vérification de l'e-mail *" value='<?php if(isset($_POST['emailconf']))echo $_POST['emailconf'] ?>'>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="password" name="password" placeholder="Mot de passe *">
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="password" name="passwordconf" placeholder="Vérification du mot de passe *">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" value="M'inscrire!">
                </div>
            </div>
        </form>
        <?php 
            include_once 'layouts/footer.php'
        ?>