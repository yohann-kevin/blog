<?php 
    session_start();
    require_once 'fonction/bdd.php';
    include_once 'fonction/users.php';
    $bdd = bdd();
    if(!empty($_POST)){
        $error = login();
    }
    include_once 'layouts/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12  col-sm-offset-3">
            <h1>Connectez-vous !</h1>
        </div>
    </div>
    <form method="post" action="">
        <?php if(isset($error)) : ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="message erreur"><?= $error ?></div>
            </div>
        </div>
        <?php endif ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="text" name="pseudo" placeholder="Pseudo *" value='<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>'>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="password" name="password" placeholder="Mot de passe *">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" value="Me connecter!">
            </div>
        </div>
    </form>
    <?php 
            include_once 'layouts/footer.php'
        ?>