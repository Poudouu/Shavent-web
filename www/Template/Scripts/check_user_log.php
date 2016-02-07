<meta charset="utf-8">
<?php
session_start();
$username=  htmlentities(trim($_POST['nom_utilisateur']));
$password = htmlentities(trim($_POST['password']));

if($username&&$password){
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
    $req=$bdd->query("SELECT * FROM subscription WHERE login='$username' && password='$password'");
    $rows = $req->rowCount();
    
    if($rows==1){
        $_SESSION['nom_utilisateur']=$username;
        $_SESSION['connected']=true;
        header("Location:../membre.php");
    }else{
    } 
    echo 'Pseudo ou mot de passe incorrect';
    
}else echo 'Merci de compléter les deux entrées';?>
