
<?php
// Titre de la page
$headTitle = "Cinewax - Nos salles";

// CSS de cette page
$addCSS =  array("css/isotope.css" ,"css/theaters.css");

// JS de cette page
$addJS =  array("");

// Queries de cette page
$addPHP = array("");
include("php/includes/head.php");
$_SESSION['erreur'] = "";
?>


<h2 class="clip-text clip-text_one">Nos salles</h2>
<div class="isotope">
    <?php
     while ($result = $theatersAllList->fetch()) {
?>
  <div class="element-item" style="width: 500px; height:500px">
  	<img class="portrait" src="resources/imgs/content/theater.png">
  	<div class="name">
  		<p style="color: #68D2C3">Salle <?php echo $result->name; ?></p>
  		<p><?php echo $result->address; ?></p>
		<p><?php echo $result->numberOfPlace; ?> places</p>
		<p><?php echo $result->phone; ?></p>

  	</div>
  </div>

    <?php
}
$theatersAllList->closeCursor();
?> 
</div>


<?php
include("php/includes/scripts.php");
?>

<!--scripts Js-->


</body>
</html>
