<?php
        $imagePath=$_POST['path'];
        $eventId=$_POST['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		$stoploop=false;
		$nextId=0;
		$rowCount=0;
		$flag=false;
		$query=$bdd->query("SELECT * FROM ".$eventId."");
		$perm_granted=false;
		while($row=$query->fetch(PDO::FETCH_ASSOC)){
			$rowCount=$rowCount+1;
			$absPath="http://192.168.0.58".$row["Path"];
			if($absPath==$imagePath){
				break;
			}
			$path=$row["Path"];
		}
		if($rowCount==1){
			$req=$bdd->query("SELECT * FROM ".$eventId." ORDER BY id DESC LIMIT 1");
			while($row=$req->fetch(PDO::FETCH_ASSOC)){
				echo $row['Path'];
				break;		
			}
		}else{
			echo $path;
		}
?>
