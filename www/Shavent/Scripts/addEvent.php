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
$dateStart = htmlentities(trim($_POST['date']));
$duration = htmlentities(trim($_POST['duree']));
$eventlocation = htmlentities(trim($_POST['event_location']));
include "../phpqrcode/qrlib.php";

echo $username."_".$eventname."_".$dateStart."_".$duration."_".$eventlocation."</br>";

if ($eventname && $dateStart && $duration && $eventlocation) {
    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=dbevent;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        echo "error";
    }
    
    $eventid=  uniqid();
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO tb_event (event_ID,Name) VALUES(?,?)');
    $req->execute(array($eventid, $eventname)); 
    
    $req = $bdd->prepare('INSERT INTO tb_event_time (event_ID,start_date, duration) VALUES(?,?,?)');  
    $req->execute(array($eventid,$dateStart, $duration));
        
    $req = $bdd->exec("CREATE TABLE `".$eventid."` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `Path` VARCHAR(200) NOT NULL,
    `PathThumb` VARCHAR(200) NOT NULL)");
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=dbusers;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        echo "error";
    }
    echo $username;
    $req = $bdd->prepare('INSERT INTO '.$username.' (Event_ID,Name) VALUES(?,?)');  
    $req->execute(array($eventid,$eventname));    
    
    $imgpath="../Events/QR";
    $fileName=$eventid.'.png';
    $codeContents = 'SHAVENT'.'+'.$eventname.'+'."".'+'.$username.'+'.'mescouilles'.'+';
    $pngAbsoluteFilePath = $imgpath."/".$fileName;
    QRcode::png($codeContents,$pngAbsoluteFilePath, QR_ECLEVEL_L, 4);
    //header('Location: ../index.php');
} else {
    echo 'Veuillez entrer tous les champs';
}
?>