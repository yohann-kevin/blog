<?php // $chiffre = 10;//variable

// $nom = "plop";

// echo $chiffre. " " .$nom; echo = afficher //on affiche la variable chiffre

// $array = [1, "plop", 2.5, "blabla"];

// echo "le chiffre a afficher est ".$chiffre ." plop";//concatenation

// echo $array[2];

// echo "votre pseudo est ".$_GET['pseudo']." et mon nom est " .$_GET['name'];//get pour récuperer

// define('CHIFFRE',7);//constante

// ($nombre > 20) ? $nombre++ : $nombre--;//ternere

// switch($pseudo){
//     case 'seb' : echo 'bonjour seb';break;
//     case 'plop' : echo 'salut plop';break;
//     default : echo' blablabla';break;
// }//switch

// while($i < $nombre){
//     echo $i;
//     $i ++;
// }

// for($i =1;$i <= 10; $i++){
//     echo 'bonjour joueur'. $i . '<br>';
// }

// if (empty($_POST)){
//     echo 'le formulaire n\'a pas pus être envoyer';
// }fonctioin empty

// if(isset($_SESSION['membre'])){
//     echo 'vous êtes connecté';
// }else{
//     header('location: index.php');
// }//foction isset

// unset($chaine);
// echo $chaine;//fonction unset

// $email = "yo44prg@icloud.com";

// if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//     echo 'votre adresse est correct !';
// }else{
//     echo 'votre adresse n\'est pas valide !';
// }fonction var_filter == regex

// $created = date('d-m-Y H:i');

// echo $created;//fonction date

// print_r($articles);//fonction print_r = Affiche des informations lisibles pour une variable
// var_dump($articles);//fonction var_dump = Affiche des informations lisibles pour une variable +lisible!!!

// $comment = htmlentities('<script>alert(\'hello kercode\')</script>');

// echo $comment;//fonction htmlentities

// $chaine = 'bonjour kercode !';

// echo strlen($chaine);//fonction strlen = compte le nombre de charactere

// $mdp = 'password';

// $password = password_hash($mdp, PASSWORD_DEFAULT);//focction password_hash = crypte les mdp

// if(password_verify('password', $password)){
//     echo 'GG';
// }else{
//     echo ':(';
// }//fonction password_verify = vérifie mdp 

// $destinataire = 'yo44prg@icloud.com';
// $sujet = 'plop test';
// $message = '<h1>salut je suis un test en php</h1>';

// $header = "Content-type: text/html; charset=utf8 \r\n";
// $header .= "From: kercode <kercodeMail@hotmail.fr> \r\n";
// $header .= "MIME-Version: 1.0 \r\n";

// mail($destinataire ,$sujet ,$message ,$header);//la fonction mail

// $chaine = 'plop';
// function somme($nombre1, $nombre2){
//     $chaine = 'plup';
//     global $chaine;
//     echo $chaine;
//     $resultat = $nombre1 + $nombre2;
//     return $resultat;
// }


// //--------

// $chiffre1 = 8;
// $chiffre2 = 10;

// $bidule = somme($chiffre1 , $chiffre2);

// echo $bidule;
// echo $chaine;

/* Connexion à une base MySQL avec l'invocation de pilote */

// $articles = $bdd->query('SELECT * FROM articles');

// while($article = $articles->fetch()){
//     echo $article['title'] . '<br>';
// }boucle avec while

// $articles = $articles->fetchAll();

// foreach($articles as $article){
//     echo $article['title'] . '<br>';
// }

// $data='mysql:dbname=blog;host=127.0.0.1';
// $user='root';
// $password='';

// try {
//     $bdd=new PDO($data, $user, $password);
// }

// catch (PDOException $e) {
//     echo 'Connexion échouée : '. $e->getMessage();
// }

// $id = 1;

// $article = $bdd->prepare('SELECT * FROM articles WHERE id=?');

// $article->execute([$id]);
// $article = $article->fetch();

// echo $article['title'];

echo password_hash("plopi", PASSWORD_DEFAULT);