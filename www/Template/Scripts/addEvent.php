<meta charset="utf-8">
<?php
session_start();
//Definition de variables:
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_SCHEMA', 'users');
//Variables passées depuis subscribe
$username=htmlentities(trim($_SESSION['nom_utilisateur']));
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
    $lastid=$bdd->lastInsertId();
    
    $reqevent=$bdd->query("SELECT event FROM subscription WHERE login='$username'");
    $results=$reqevent->fetch(PDO::FETCH_ASSOC);
    
    if(!$results['event']==0){
    $array_string= unserialize($results['event']);
    print_r($array_string);
    $array=  array_push($array_string, $lastid);
    print_r ($array_string);
    //$rows = count($array_string);
    }else{$array_string=[$lastid]; print_r($array_string); }
    $array_string=  serialize($array_string);
    print_r($array_string);
    print_r($username);
    $reqevent2 = $bdd->query("UPDATE subscription SET event='$array_string' WHERE login='$username'");
    header('Location:../membre.php');
} else {
    echo 'Veuillez entrer tous les champs';}
?>