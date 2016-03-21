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
include "../phpqrcode/qrlib.php";

if ($eventname && $date && $duration && $eventlocation) {
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        echo "error";
    }
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO events (nom, date,temps,lieu) VALUES(?,?,?,?)');
    $lastid=$bdd->lastInsertId();
    echo $lastid;
    mkdir("../Events/$lastid_$eventname",0777,true);
    mkdir("../Events/$lastid_$eventname/$username",0777,true);
    $imgpath="../Events/$eventname";
    $req->execute(array($eventname, $date, $duration, $eventlocation));
    $reqevent=$bdd->query("SELECT event FROM subscription WHERE login='$username'");
    $results=$reqevent->fetch(PDO::FETCH_ASSOC);   
    if(!$results['event']==0){
    $array_string= unserialize($results['event']);
    $array=  array_push($array_string, $lastid);
    }else{
        $array_string[0]=$lastid;
    }
    $array_ser=  serialize($array_string);
    $writeevent=$bdd->query("UPDATE subscription SET event='$array_ser' WHERE login='$username'");
    $eventid=$lastid;
    $requser=$bdd->query("SELECT * FROM subscription WHERE login='$username' ");
    $userInfo=$requser->fetch(PDO::FETCH_ASSOC);
    $userPass=$userInfo['password'];
        
    $fileName=$eventid."_".$eventname.'.png';
    $codeContents = 'SHAVENT'.$eventname.$duration.$username;
    $pngAbsoluteFilePath = $imgpath.$fileName;
    echo $pngAbsoluteFilePath;
    QRcode::png($codeContents,$pngAbsoluteFilePath);
    // Redirection du visiteur vers la page index
    /*header('Location: ../membre.php');*/
} else {
    echo 'Veuillez entrer tous les champs';}
?>