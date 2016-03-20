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
    mkdir("../Events/$eventname",0777,true);
    mkdir("../Events/$eventname/$username",0777,true);
    $imgpath="/Events/$eventname";
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO events (nom, date,temps,lieu,path) VALUES(?,?,?,?,?)');
    $req->execute(array($eventname, $date, $duration, $eventlocation,$imgpath));
    $lastid=$bdd->lastInsertId();
    
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

         // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
        $requser=$bdd->query("SELECT * FROM subscription WHERE login='$username' ");
        $userInfo=$requser->fetch(PDO::FETCH_ASSOC);
        $userPass=$userInfo['password'];
        
        include "phpqrcode/qrlib.php";
        $fileName=$eventid.$eventname.'.png';
        $tempDir= "/Temp";
        $codeContents = 'SHAVENT'.$eventname.$duration.$username;
        $pngAbsoluteFilePath = $tempDir.$fileName;
        QRcode::png($codeContents,$pngAbsoluteFilePath);
    
    // Redirection du visiteur vers la page index
    header('Location: ../membre.php');
} else {
    echo 'Veuillez entrer tous les champs';}
?>