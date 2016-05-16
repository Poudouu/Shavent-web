<?php
if (isset($_GET["username"])  && isset($_GET["eventId"]) && isset($_GET["pictName"])){
	$username = $_GET["username"];
	$eventId = $_GET["eventId"];
	$pictName = $_GET["pictName"];
	
	//Connect to db event
	try {
    		$bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
	} catch (Exception $e) {
    		die('Erreur : ' . $e->getMessage());
	}

	//Define the path to the picture and to the thumb on the server
        $path = "/Users/".$username."/Image/".$pictName;
	$pathThumb="/Users/".$username."/Thumb/".$pictName;

	//Check if the picture is already mentionned in the db event, if yes, return 1. 
    	$req = $bdd->query("SELECT * FROM ".$eventId." WHERE Path='".$path."'");
    	$rows = $req->rowCount();
    
    	if($rows==0){    

		//Re define the path to the picture and the thumb on the server for manipulation with GD library. 
		$path = "/var/www/shavent/Users/".$username."/Image/".$pictName;
		$pathThumb="/var/www/shavent/Users/".$username."/Thumb/".$pictName;

		make_thumb_and_compress($path, $pathThumb, 250);

		//Chek if the picture and the thumb files both exist
		if(file_exists($pathThumb) && file_exists($path)){
		    $fileCreated=true;
		}else{
		    $fileCreated=false;
		}

		//If the files exists, insert the picture infos in the event db
		if($fileCreated){

			//Define the path to the picture and to the thumb on the server
        		$path = "/Users/".$username."/Image/".$pictName;
			$pathThumb="/Users/".$username."/Thumb/".$pictName;

			$req = $bdd->prepare('INSERT INTO '.$eventId.' (Path,PathThumb) VALUES(?,?)');
			$req->execute(array($path,$pathThumb)); 

			$check= $bdd->prepare("SELECT * FROM ".$eventId." WHERE Path='".$path."'");
			$check->execute();
			$rows = $check->rowCount();

			//Check if the line is correctly added or not
			if(!$rows==0){
				$lineAdded=true;
			}else{
				$lineAdded=false;
			}  
			
			//If everything is OK, echo 1, if not, echo 0 (except if the picture was already in the event db, in that case, echo 1 directly. 
			if($lineAdded){
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
	}else{
		echo "1";
	}
}

function make_thumb_and_compress($src, $dest, $desired_width) {
      /* read the source image */
      $FLAG=0;
      while ($FLAG<60)
      {
      		if(file_exists($dest)){
                	$FLAG=61;
                }else{
			$source_image = imagecreatefromjpeg($src); 

			$width = imagesx($source_image);
      			$height = imagesy($source_image);

                        //Compress picture...
			imagejpeg($source_image, $src, 50);

      			/* find the “desired height” of this thumbnail, relative to the desired width  */
      			$desired_height = floor($height * ($desired_width / $width));

      			/* create a new, “virtual” image */
      			$virtual_image = imagecreatetruecolor($desired_width, $desired_height);

      			/* copy source image at a resized size */
      			imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

      			/* create the physical thumbnail image to its destination */
      			imagejpeg($virtual_image, $dest);

			sleep(2);
			$FLAG=$FLAG+1;
		}
      }	
} 


?>
