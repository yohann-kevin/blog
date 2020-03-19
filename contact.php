<?php 
    session_start();
    include_once 'layouts/header.php';
    include_once 'fonction/contact.php';
    if(!empty($_POST)){
        $errors = contact();    
    }

?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Contactez-moi !</h1>
            </div>
        </div>
        <form method="post" action="">
            <?php
                if(isset($errors)) :
                    if($errors):
                foreach($errors as $error) :
            ?>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="message erreur"><?= $error ?></div>
                    </div>
                </div>

                <?php endforeach; else : ?>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="message confirmation">Votre message a bien été envoyer !</div>
                    </div>
                </div>

            <?php endif; endif ?>
            
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="nom" placeholder="Votre nom *" value='<?php if(isset($_POST['nom']))echo $_POST['nom'] ?>'>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="email" placeholder="Votre adresse email *" value='<?php if(isset($_POST['email']))echo $_POST['email'] ?>'>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="texte" placeholder="En quoi puis-je vous aider ? *" value='<?php if(isset($_POST['texte']))echo $_POST['texte'] ?>'></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" value="Envoyer!">
                </div>
            </div>
        </form>
        <?php 
            include_once 'layouts/footer.php'
        ?>