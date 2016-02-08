<?php
session_start();
$username=$_SESSION['nom_utilisateur'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Shavent</title>
		<link rel="stylesheet" href="../style_member.css">
	</head>
        <body class="body">
            <div class =outern id="header">
				<nav class="header_upperline">
                                    <a class="logo" href="index.php" style="background-image:url(../drawable/logo.png);" ></a>
				</nav>             
            </div>
            <div id="container">
                <div id="center" class="column">bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</div>
                <div id="left" class="column">
                    <ul class="list_nav">  
                        <h4> Navigation</h4>
                        <li class="Accueil">Accueil</li>
                        <li class="Accueil">Mes évènements</li>
                        <li class="Accueil">Paramètres du compte</li>
                        <li class="Accueil">Messages</li>
                    </ul>  
                </div>
                <div id="right" class="column">
                    <img id="sharevnt" src="../drawable/share-event.png"/>
                </div>
            </div>
            <div id="footer"> Firebears Production</div>
	</body>
        
</html>
