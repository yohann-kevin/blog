<?php 

function contact(){
    extract($_POST);

    $validation = true;

    $errors = [];

    if(empty($nom) || empty($email) || empty($texte)){
        $validation = false;

        $errors[] = "tous les champs sont obligatoires !!";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validation = false;

        $errors[] = "Cet email n'est pas valide !!";
    }

    if($validation){
        $to = 'yo44prg@icloud.com';
        $sujet = 'Nouveau message de : ' .$nom;
        $message = '<h1>Nouveau message de '.$nom .'</h1>
                    <h2>Adresse Email: ' .$email .'</h2>
                    <p>' .nl2br($texte) . '</p>';
        $headers = 'FROM' .$nom .' <' .$email .'> '."\r\n";
        $headers .= 'MIME-Version 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";

        mail($to, $sujet, $message, $headers);
        unset($_POST['nom']);
        unset($_POST['email']);
        unset($_POST['texte']);
    }


    return $errors;
}
