<?php
// Titre de la page
$headTitle = "Cinewax - Nos tarifs";

// CSS de cette page
$addCSS =  array("");

// JS de cette page
$addJS =  array("");

// Queries de cette page
$addPHP = array("");
include("php/includes/head.php");
$_SESSION['erreur'] = "";
?>


<div class="rate-container">
<div id="rate-img">
	<img src="resources/imgs/content/subscribe.jpg" style="width: 100%">
</div>
<div id="rate-text">
	
<h2 class="clip-text clip-text_one">NOS TARIFS</h2>
	<p>Nous proposons nos séances à un prix abordable !</p>
	<p><br>Tarif ENFANT : 500 FCFA ou 0,75€
	<br>Tarif ADULTE : 800 FCFA ou 1.20€</p>
</div>

</div>



<?php
include("php/includes/scripts.php");
?>

<!--scripts Js-->


</body>
</html>
