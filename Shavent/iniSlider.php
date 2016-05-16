<?php
        $imagePath=$_GET['path'];
		$eventId=$_GET["id"]
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		
		
		$query=$bdd->query("SELECT Path FROM".$eventId."");
        $path=$query->fetch(PDO::FETCH_ASSOC);
		while($row=$query->fetch()){
			
			$previousPath=$row["Path"]
		}
?>
