<?php
        $imageName=$_POST['name'];
        $eventId=$_POST['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $req=$bdd->query("SELECT id FROM image WHERE event='$eventId' AND name='$imageName'");   
		$data=$req->fetch(PDO::FETCH_ASSOC);
		$currentId=$data["id"];
        $req=$bdd->query("SELECT id FROM image WHERE event='$eventId'");   
		$stoploop=false;
		$nextId=0;
		$flag=false;
		while($row=$req->fetch()){
			if($flag==false){
				$firstId=$row["id"];
				$flag=true;	
			}
			if($stoploop==true){
				$nextId=$row["id"];
				break;
			}
			if($currentId==$row["id"]){
				$stoploop=true;
			}
		}
		if(!$nextId==0){
			$req=$bdd->query("SELECT path FROM image WHERE id='$nextId'");   
			$path=$req->fetch(PDO::FETCH_ASSOC);
		}else{
			$req=$bdd->query("SELECT path FROM image WHERE id='$firstId'");   
			$path=$req->fetch(PDO::FETCH_ASSOC);
		}
		echo $path["path"];
?>