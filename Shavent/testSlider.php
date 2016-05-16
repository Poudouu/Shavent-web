<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dynamic Carousel Silder</title>
<!-- bootstrap css -->
    <!-- Bootstrap core CSS--> 
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- custom style css -->

<link rel="stylesheet" type="text/css" href="app.css">


</head>
<body>
 <div class="container">
 <div class="row">
 <div id="mycarousel" class="carousel slide" dataride="carousel">

 <ol class="carousel-indicators">
 <?php
 $a = 0;
        $evntId=$_GET['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		$sql=$bdd->query("SELECT * FROM ".$evntId.""); 
 while($row=$sql->fetch(PDO::FETCH_ASSOC))
 {
 ?>
 <li data-target="#mycarousel" data-slide-to="<?php echo $a++; ?>"></li>
 <?php } ?>
 </ol>

 <div class="carousel-inner" role="listbox">
 <?php
        $evntId=$_GET['id'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=DBEVENT;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		$sql=$bdd->query("SELECT * FROM ".$evntId.""); 
 while($row=$sql->fetch(PDO::FETCH_ASSOC))
 {
 ?>
 <div class="item">
 <img src="<?php echo $row['Path']; ?>" class="imgresponsive"
alt="<?php echo $row['Path']; ?>"/>
 </div>
 <?php } ?>

 </div><!--/carousel-inner-->

 <a href="#mycarousel" class="left carousel-control" dataslide="prev"
role="button">
 <i class="fa fa-angle-left prevSlide"></i>
 </a>
 <a href="#mycarousel" class="right carousel-control" dataslide="next"
role="button">
 <i class="fa fa-angle-right nextSlide"></i>
 </a> 
 </div><!--carousel slide-->
 </div><!-- /row-->
 </div>
</body>
</html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	

	<script>
$(document).ready(function(e) {
 $('.carousel-indicators li:nth-child(1)').addClass('active');
 $('.item:nth-child(1)').addClass('active');

});
</script> 