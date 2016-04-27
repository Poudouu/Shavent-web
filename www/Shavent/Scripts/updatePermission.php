    <?php

    $username=  htmlentities(trim($_POST['username']));
    $eventId = htmlentities(trim($_POST['eventId']));

        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=dbusers;charset=utf8', 'root', '');
            // $bdd = new PDO('mysql:host=localhost;dbname=dbusers;charset=utf8', 'shaventsql', '123Test123');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->query('INSERT INTO '.$username.' (Event_ID) VALUES ('.$eventId.')');
        $check= $bdd->prepare("SELECT * FROM ".$username." WHERE Event_ID='".$eventId."'");
        $check->execute();
        $rows = $check->rowCount();
        if(!$rows==0){echo '1';}else{echo '0';}
        
    ?>


