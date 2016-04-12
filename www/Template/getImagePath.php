<?php
        $imageName=$_POST['name'];
        $evntId=$_POST['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $req=$bdd->query("SELECT path FROM image WHERE name='$imageName' AND event='$evntId'");   
        $path=$req->fetch(PDO::FETCH_ASSOC);
        $imPath=$path["path"];
        echo $imPath;
?>