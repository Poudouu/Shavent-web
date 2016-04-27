<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Shavent</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <script>
        function generateMainView(param){
            var div = document.createElement("div");
            switch (param){
                case 1:
                div.innerHTML= "<form method='post' action='Scripts/addEvent.php'>"+
                                "<fieldset class='subscription_form' >"+ 
                                    "<legend>Veuillez rentrer les informations de l'évènement</legend>"+
                                    "<label for='event_name' style='margin:10px'>Nom de l'évènement</label>"+
                                    "<input type='text' name='event_name' id='event_name' autofocus required/><br/>"+
                                    "<label for='date' style='margin:10px'>Date de début</label>"+
                                    "<input type='date' name='date' id='date' required/><br/>"+
                                    "<label for='duree' style='margin:10px'>Durée de l'évènement</label>"+
                                    "<input type='text' name='duree' id='duree' required/><br/>"+                
                                    "<label for='event_location' style='margin:10px'>Lieu de l'évènement</label>"+
                                    "<input type='text' name='event_location' id='event_location' required/><br/>"+
                                "</fieldset>"+
                                "<input type='submit' value='Envoyer' style='margin:10px'></code>"+
                               "</form>";    
                case 2:
                case 3:    
            }
            var mainview = document.getElementById("mainview");
            document.getElementById("mainview").innerHTML="";
            mainview.appendChild(div);
        }
		
		function generatePImagePreview(path){
		
			
		}
		
    </script>
    <?php
    session_start();
    function createTab(){
        $username=$_SESSION['nom_utilisateur'];
         // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=dbusers;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
        $reqevent=$bdd->query("SELECT * FROM ".$username."");
        while($event=$reqevent->fetch(PDO::FETCH_ASSOC)){
        $evName=$bdd->query("SELECT Event_ID FROM ".$username."");
            echo "<li class='event'>".
                 "<a href='event.php?id=".$event['Event_ID']."'>".$event['Name']."</a>";
        }
    }
     ?>


    
    
  </head>

  <body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SP<i class="fa fa-circle"></i>T</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i class="fa fa-envelope-o"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
	<div id="headermembre">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
				<h1>Shavent</h1>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- headerwrap -->

        <div id="container_member">
            <div id="mainview" class="column">
            </div>
            <div id="eventlist" class="column">
                <div id="listevent" class="column">
                    <ul class="eventlistbar">
                        <?php createTab() ?>
                        <li class="add_event"><a id="add_event" onClick="generateMainView(1)"><img id="add_event_icon" src="assets/img/add.png" alt=""/> Ajouter un évènement</a></li>
                    </ul>
                </div>
            </div>
            <div id="right" class="column">
                        
            </div>
	</div>
        
	<!-- FOOTER -->
	<div id="f">
		<div class="container">
			<div class="row centered">
				<a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
