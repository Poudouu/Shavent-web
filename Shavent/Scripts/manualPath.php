<?php

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
    
    $eventid=$_GET['id'];
    $username=$_GET['user'];
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        }    
    $dirNameThumb= "../Users/".$username."/Thumb/";
    $dirNameFullScale = "../Users/".$username."/Image/";
    $gDirNameThumb = "http://localhost/Shavent/Users/".$username."/Thumb/";
    $gDirNameFullScale = "http://localhost/Shavent/Users/".$username."/Image/";
    $images = glob($dirNameFullScale."*.{jpg,JPG}", GLOB_BRACE);
        if(!$images==0){
            foreach($images as $image) {
                $imageName= pathinfo($image, PATHINFO_FILENAME);
                $pathThumb=$dirNameThumb.$imageName.'.jpg';
                $path=$dirNameFullScale.$imageName.'.jpg';
                $gPathThumb=$gDirNameThumb.$imageName.'.jpg';
                $gpath=$gDirNameFullScale.$imageName.'.jpg';
                if(!file_exists($pathThumb)) {   
                   make_thumb($image, $pathThumb, 250);
                   $req = $bdd->prepare('INSERT INTO '.$eventid.' (Path,PathThumb,user) VALUES(?,?,?)');
		   		$req->execute(array($gpath,$gPathThumb,$username)); 
                }
        
            }
        }
        
?>
