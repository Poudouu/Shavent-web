<?php
session_start();
if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
header("Location:membre.php");   
} else {
    header("Location:index.html");
}   
?>
