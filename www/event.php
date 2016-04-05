<!DOCTYPE html>
<html lang="en">
<?php         session_start();?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Shavent</title>
    
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
    <!-- Bootstrap core CSS--> 
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
    .slideshow { height: 232px; width: 232px; margin: auto }
    .slideshow img { padding: 15px; border: 1px solid #ccc; background-color: #eee; }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style type="text/css">
	#wrapper{
		display:block;
		margin:auto;
		height:720px;
		width:960px;
	}
	#container{
		overflow:auto;
	}
	#prev{
		background-image:url(assets/img/arrowLeft.png);
		background-repeat:no-repeat;
		background-position:center center;
		display:block;
		float:left;
		height:128px;
		width:128px;
		position:relative;
		z-index:10;
	}
	#next{
		background-image:url(assets/img/arrowRight.png);
		background-repeat:no-repeat;
		background-position:center center;
		background-repeat:no-repeat;
		background-position:center center;
		display:block;
		float:right;
		height:128px;
		width:128px;
		position:relative;
		z-index:10;
	}
	#slider{
		display:block;
		margin:auto;
		float:left;
		overflow:hidden;
		position:absolute;
	}
        #dialog_overlay{
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top:0;
            left: 0;
            background: #FFF;
            z-index: 10;
            opacity: .8;
        }
        #container{
            display: none;
            position: fixed;
            background: #000;
            border-radius: 7px;
            background: rgb(60, 60, 60);
            background: rgba(60, 60, 60, 0.4);
            z-index: 10;
        }
        
        img{
    max-width: 100%;
    max-height: 100%;
    opacity: 1;
    }
    
    </style>
    <script type="text/javascript">
        function generateImagePreview(){
            
            
		$('#slider').cycle({
				fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		});
        }
    </script>
	<script>
        function generateMainView(param){
            var div = document.createElement("div");
            switch (param){
                case 1:
                div.innerHTML= "<form method='post' action='Scripts/addEvent.php'>"+"<fieldset class='subscription_form' >"+ "<legend>Veuillez rentrer les informations de l'évènement</legend>"+"<label for='event_name' style='margin:10px'>Nom de l'évènement</label>"+"<input type='text' name='event_name' id='event_name' autofocus required/><br/>"+"<label for='date' style='margin:10px'>Mot de passe</label>"+"<input type='date' name='date' id='date' required/><br/>"+"<label for='duration' style='margin:10px'>Durée de l'évènement (min)</label>"+"<input type='text' name='duration' id='duration' required/><br/>"+"<label for='event_location' style='margin:10px'>Lieu de l'évènement</label>"+"<input type='text' name='event_location' id='event_location' required/><br/>"+"</fieldset>"+"<input type='submit' value='Envoyer' style='margin:10px'></code>"+"</form>";
                case 2:
                case 3:    
            }
            document.getElementById("mainview").innerHTML="";
            var mainview = document.getElementById("mainview");
            mainview.appendChild(div);
        }
        
        function generatePreviewImage(){
            this.render=function(path){
                var winH= window.innerHeight;
                var winW= window.innerWidth;
                var dialogoverlay = document.getElementById('dialog_overlay');
                var image = document.getElementById('imagePreview');
                var dialog = document.getElementById('container');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH + "px";
                var dialogHeight=winH*.8;
                var dialogWidth=winW*.8;
                dialog.style.height = dialogWidth;
                dialog.style.width = dialogHeight;
                dialog.style.left = ((winW*0.1))+"px";
                dialog.style.top = "100px";
                dialog.style.display = "block";
                var div = document.createElement("div");
                div.style.height = winH*.8+"px";
                div.style.width = winW*.8+"px";
                div.style.opacity = 1;
                div.innerHTML="<img src='"+path+"' />";
                dialog.appendChild(div);
            }
            this.ok=function(){
            }
        }
        var preview = new generatePreviewImage();
    </script>
    <?php
    $g_imagepath = null;
    function createTab(){
        $username=$_SESSION['nom_utilisateur'];
         // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
            
        $reqevent=$bdd->query("SELECT event FROM subscription WHERE login='$username'");
        $results=$reqevent->fetch(PDO::FETCH_ASSOC);
        $eventnames=  unserialize($results['event']);
        foreach($eventnames as $event){
        $reqev=$bdd->query("SELECT nom FROM events WHERE id='$event'");
        $ev=$reqev->fetch(PDO::FETCH_ASSOC);
        echo "<li class='event'> <a  href='event.php?id=$event'>$ev[nom]</a> ";
        }
    }
    function checkEventPerm(){  
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    
    $eventid=$_GET['id'];
    $username=$_SESSION['nom_utilisateur'];
    $reqevent=$bdd->query("SELECT event FROM subscription WHERE login='$username'");
    $results=$reqevent->fetch(PDO::FETCH_ASSOC);   
    if(!$results['event']==0){
    $array_string= unserialize($results['event']);
    }
    $perm_granted=false;
    foreach($array_string as $eventidperm)
        if($eventidperm==$eventid){
             $perm_granted=true;
            }
    return $perm_granted;
    } 
    function make_thumb($src, $dest, $desired_width) {
      /* read the source image */
      $source_image = imagecreatefromjpeg($src);
      $width = imagesx($source_image);
      $height = imagesy($source_image);

      /* find the “desired height” of this thumbnail, relative to the desired width  */
      $desired_height = floor($height * ($desired_width / $width));

      /* create a new, “virtual” image */
      $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

      /* copy source image at a resized size */
      imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

      /* create the physical thumbnail image to its destination */
      imagejpeg($virtual_image, $dest);
    } 
    function createMainView(){
        ini_set("gd.jpeg_ignore_warning", true);
        $permission=checkEventPerm();
        if($permission){
            $eventid=$_GET['id'];
            $username=$_SESSION['nom_utilisateur'];
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
             } catch (Exception $e) {
               die('Erreur : ' . $e->getMessage());
            }
            $req=$bdd->query("SELECT * FROM events WHERE id='$eventid'");   
            $event=$req->fetch(PDO::FETCH_ASSOC);
            $eventname=$event['nom'];
            $dirNameThumb= "Events/".$eventid."_".$eventname."/Thumbnail/";
            $dirNameFullScale = "Events/".$eventid."_".$eventname."/".$username."/";
            $g_imagepath=$dirNameFullScale;
            $images = glob($dirNameFullScale."*.jpg");
            if(!$images==0){
            foreach($images as $image) {
            $imageName= pathinfo($image, PATHINFO_FILENAME);
            $pathThumb=$dirNameThumb.$imageName.'.jpg';
			$path=$dirNameFullScale.$imageName.'.jpg';
            if(!file_exists($pathThumb)) {   
            make_thumb($image, $pathThumb, 250);
            }
            //'.$path.'
            echo '<img src="'.$pathThumb.'" onClick="preview.render(\''.$path.'\')"/>';
            }}else{echo "<h3 style='margin:10px'>Pas d'images dans le dossier</h3>";}
        }else{
            echo "vous n'avez pas la permission d'afficher ce contenus";
        }
    }   
    function display_image(){
        list($width, $height, $type, $attr)=getimagesize($imgpath);
        echo '<img src="'.$imgpath.'" style="height:'.$height.';width:'.$width.'"/>';
    }
    function generateDownBut(){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    $eventid=$_GET['id'];
    $req=$bdd->query("SELECT nom FROM events WHERE id='$eventid'");   
    $event=$req->fetch(PDO::FETCH_ASSOC);
    $path='Events/'.$eventid.'_'.$event['nom'].'/QR'.$eventid.'/'.$eventid.'_'.$event['nom'].'.png';
    /**/
    echo "<a href='$path' download><button>Download!</button></a>";
    
    }
    ?>
  </head>
  <body>
    <div id="dialog_overlay"></div>  
        <div id="container">
            <div id="imagePreview"></div>
        </div>
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
                <?php createMainView()?>
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
                <?php generateDownBut()?>
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
    </body>
</html>
