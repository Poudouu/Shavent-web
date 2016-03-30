<meta charset="utf-8">
<?php
//Definition de variables:
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_SCHEMA', 'users');
//Variables passées depuis subscribe
$username=  htmlentities(trim($_POST['nom_utilisateur']));
$password = htmlentities(trim($_POST['password']));
$mail= htmlentities(trim($_POST['mail']));

if($username&&$password&&$mail){
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Insertion du message à l'aide d'une requête préparée
    $password=  sha1($password);
  
    $checkuser= $bdd->prepare("SELECT * FROM subscription WHERE login='$username'");
    $checkuser->execute();
    $rows = $checkuser->rowCount();
    if($rows==0)
    {
    $req = $bdd->prepare('INSERT INTO subscription (login, password,email) VALUES(?, ?,?)');
    $req->execute(array($username, $password,$mail));
    // Redirection du visiteur vers la page index
    header('Location: ../index.html');
    }else echo 'Ce pseudo est déjà utilise, merci de changer';

}else echo 'Veuillez entrer tous les champs';
?>