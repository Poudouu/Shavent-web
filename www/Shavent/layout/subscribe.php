<html>
	<head>
		<meta charset="utf-8">
				<title>Shavent</title>
		<link rel="stylesheet" href="../style_subscribe.css">
	</head>
        <body>
		<div class="outern"  style="background-image: url(../drawable/header_bg.jpg)">
			<header class="header">
				<nav class="header_upperline">
					<a class="logo" href="/fr" style="background-image:url(../drawable/logo.png);" ></a>
				</nav>
			</header>
		</div>	
            <form method="post" action="../Script/add_new_user.php">
                <div class="body_subscribe">
                    <fieldset class='subscription_form' >
                        <legend>Merci d'entrer vue informations</legend>
                        <label for="nom_utilisateur" >Nom d'utilisateur</label>
                        <input type="text" name='nom_utilisateur' id="nom_utilisateur" autofocus required/><br/>
                        <label for="password">Mot de passe</label>
                        <input type="text" name='password' id="password" required/><br/>
                        <label for="mail">Adresse mail</label>
                        <input type="text" name='mail' id="mail" required/><br/>
                    </fieldset>
                   <input type="submit" value="Envoyer"></code>
                    <?php
                    /*
                    try{
                    $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8','root','');
                    } 
                    catch (Exception $e){
                        die('Erreur :' .$e->getMessage());
                    }
                    $response = $bdd->query('SELECT * FROM subscription');
                    $donnees=$response->fetch();
                    ?>
                        ID: <?php echo $donnees['id'];?> <br/>
                        Username: <?php echo $donnees['login']?> <br/>
                        password: <?php echo $donnees['password']?> <br/>
                        email : <?php echo $donnees['email']?> <br/>
                        Date: <?php echo $donnees['date_inscription']?> <br/>
                    <?php
                   
                    $response->closeCursor();
                    
                    */ 

                    
                    ?>
                    

                </div>
            </form>
	</body>
</html>