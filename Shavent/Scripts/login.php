<?php

if (isset($_GET["userName"])  && isset($_GET["password"]) ){
				$userName = $_GET["userName"];
				$password = $_GET["password"];
				$result = login( $userName, $password);
				echo $result;
				}

function login($userName, $password)
{
        try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=DBUSERS;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Insertion du message à l'aide d'une requête préparée
    //$password=  sha1($password);
    $req=$bdd->query("SELECT * FROM tb_users WHERE username='$userName' AND password='$password'");
    $rows = $req->rowCount();
    
    if($rows==1){
		return 1;
    }else{
	return 0;
    } 

}

?>
