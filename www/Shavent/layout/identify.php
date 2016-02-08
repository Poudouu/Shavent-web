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
					<a class="logo" href="index.php" style="background-image:url(../drawable/logo.png);" ></a>
				</nav>
			</header>
		</div>	
            <form method="post" action="../Script/check_user_log.php">
                <div class="body_subscribe">
                    <fieldset class='subscription_form' >
                        <legend>Veuillez entrer vos information pour vous logger</legend>
                        <label for="nom_utilisateur" >Nom d'utilisateur</label>
                        <input type="text" name='nom_utilisateur' id="nom_utilisateur" autofocus required/><br/>
                        <label for="password">Mot de passe</label>
                        <input type="text" name='password' id="password" required/><br/>
                    </fieldset>
                   <input type="submit" value="Envoyer"></code>
                </div>
                    <div class='to_subscribe'>
                        <p>Pas encore inscrit ? <a href="subscribe.php">Allez à la page d'inscription</a></p>
                </div>
            </form>
	</body>
</html>