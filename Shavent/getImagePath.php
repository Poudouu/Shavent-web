<?php
        $evntId=$_POST['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		$query=$bdd->query("SELECT * FROM ".$evntId."");
        $path=$query->fetch(PDO::FETCH_ASSOC);
		while($row=$query->fetch()){
		echo $row["Path"]."+";
		}
?>
