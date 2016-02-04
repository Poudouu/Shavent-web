<?php
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
$req = $bdd->prepare('INSERT INTO subscription (login, password,email) VALUES(?, ?,?)');
$req->execute(array($_POST['nom_utilisateur'], $_POST['password'],$_POST['mail']));

// Redirection du visiteur vers la page du minichat
header('Location: ../layout/index.php');
?>