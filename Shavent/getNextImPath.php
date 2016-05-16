<?php
        $imagePath=$_POST['path'];
        $eventId=$_POST['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		$query=$bdd->query("SELECT * FROM ".$eventId."");
		$stoploop=false;
		$nextPath=0;
		$lastPath=false;
		$flag=false;
		while($row=$query->fetch()){
			if($flag==false){
				$firstPath=$row["Path"];
				$flag=true;	
			}
			if($stoploop==true){
				$lastPath=false;
				$nextPath=$row["Path"];
				break;
			}
			$absPath=$row["Path"];
			if($absPath==$imagePath){
				$stoploop=true;
				$lastPath=true;
			}
		}
		if($lastPath==false){
			echo $nextPath;
		}else{
			echo $firstPath;
		}
?>
