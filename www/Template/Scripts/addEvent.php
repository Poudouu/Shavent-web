<meta charset="utf-8">
<?php
session_start();
//Definition de variables:
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_SCHEMA', 'users');
//Variables passées depuis subscribe
$username=htmlentities(trim($_SESSION['username']));
$eventname=  htmlentities(trim($_POST['event_name']));
$date = htmlentities(trim($_POST['date']));
$duration = htmlentities(trim($_POST['duration']));
$eventlocation = htmlentities(trim($_POST['event_location']));

if ($eventname && $date && $duration && $eventlocation) {
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO events (nom, date,temps,lieu) VALUES(?, ?,?,?)');
    $req->execute(array($eventname, $date, $duration, $eventlocation));
    // Redirection du visiteur vers la page index
    header('Location: ../membre.php');
} else {
    echo 'Veuillez entrer tous les champs';}
    ?>