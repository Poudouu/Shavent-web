    <?php


if (isset($_GET["username"])  && isset($_GET["eventId"]) && isset($_GET["eventname"])){
	$username = $_GET["username"];
	$eventId = $_GET["eventId"];
	$eventname = $_GET["eventname"];

	$result = checkAndUpdatePermission( $username, $eventId, $eventname);
	echo $result;

}

function checkAndUpdatePermission( $username, $eventId, $eventname){
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=DBUSERS;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

	//Check if the user already have the permission for the event ID, if yes, return 1. 
    	$req = $bdd->query("SELECT * FROM ".$username." WHERE Event_ID='".$eventId."'");
    	$rows = $req->rowCount();
    
    	if($rows==0){
		//If the user doesn't have the permission corresponding to the event ID, insert the permission in the table.
                $req2 = $bdd->prepare('INSERT INTO '.$username.' (Event_ID,Name) VALUES(?,?)');  
                $req2->execute(array($eventId,$eventname)); 

		//Control that the permission was updated successfully, echo 1 if yes. 
    	        $req3 = $bdd->query("SELECT * FROM ".$username." WHERE Event_ID='".$eventId."'");
    	        $rows = $req3->rowCount();

		if(!$rows==0){
			return 1;
		}else{
			return 0;
		}
    	}else{
		return 1;
    	}  
}
?>


