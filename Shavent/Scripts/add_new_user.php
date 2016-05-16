<meta charset="utf-8">
<?php
//Definition de variables:
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_SCHEMA', 'DBUSERS');
//Variables passées depuis subscribe
$username=  htmlentities(trim($_POST['nom_utilisateur']));
$password = htmlentities(trim($_POST['password']));
$mail= htmlentities(trim($_POST['mail']));

if($username&&$password&&$mail){
    // Connexion à la base de données
    try
    {
        //$bdd = new PDO('mysql:host=192.168.0.53;dbname=DBUSERS;charset=utf8', 'shaventsql', '');
       $bdd = new PDO('mysql:host=localhost;dbname=DBUSERS;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Insertion du message à l'aide d'une requête préparée
    //$password=  sha1($password);
    $checkuser= $bdd->prepare("SELECT * FROM tb_users WHERE login='$username'");
    $checkuser->execute();
    $rows = $checkuser->rowCount();
    if($rows==0)
    {
    $date = date('m/d/Y h:i:s a', time());
    echo $date;
    //TO_DO: Temporary set is_active at 1 at user creation, will have to be done by mail later. 
    $req = $bdd->prepare('INSERT INTO tb_users (username,password,email,is_active) VALUES(?,?,?,?)');
    $req->execute(array($username, $password,$mail,1));
    $req = $bdd->prepare('INSERT INTO tb_user_connection (username,first_connection, last_connection) VALUES(?,NOW(),NOW())');
    $req->execute(array($username));
    
    
    $req = $bdd->exec("CREATE TABLE `".$username."` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `Event_ID` VARCHAR(13) NOT NULL,
    `Name` TEXT NOT NULL)");
    
    mkdir("../Users/".$username);
    mkdir("../Users/".$username."/Image");
    mkdir("../Users/".$username."/Thumb");
    //$req = $bdd->prepare('INSERT INTO tb_users (username,password,email) VALUES(?,?,?)');
    //$req->execute(array($username, $password,$mail));
    // Redirection du visiteur vers la page index
    header('Location: ../index.html');
    }else echo 'Ce pseudo est déjà utilise, merci de changer';

}else echo 'Veuillez entrer tous les champs';
?>
