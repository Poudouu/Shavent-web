<?php

$username=  htmlentities(trim($_GET['username']));
$eventId= htmlentities(trim($_GET['eventid']));
$pictName= htmlentities(trim($_GET['pictname']));

try {
    $bdd = new PDO('mysql:host=localhost;dbname=dbevent;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$userFolderPath="/Template/Users/".$username."/Image";
$path = $userFolderPath."/".$pictName.".jpg";
$pathThumb="/Template/Users/".$username."/Thumb/".$pictName.".jpg";
$req = $bdd->prepare('INSERT INTO '.$eventId.'(Path,PathThumb) VALUES(?,?)');
$req->execute(array($path,$pathThumb)); 

$check= $bdd->prepare("SELECT * FROM ".$eventId." WHERE Path='".$path."'");
$check->execute();
$rows = $check->rowCount();
if(!$rows==0){$lineAdded=true;}else{$lineAdded=false;}

$userFolderPath="../Users/".$username."/Image";
$path = $userFolderPath."/".$pictName.".jpg";
$pathThumb="../Users/".$username."/Thumb/".$pictName.".jpg";

make_thumb($path, $pathThumb, 250);


if(file_exists($pathThumb)){$fileCreated=true;}else{$fileCreated=false;}
if($fileCreated && $lineAdded){echo "1";}else{echo "0";}

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

?>