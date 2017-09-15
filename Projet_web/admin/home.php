<?php
include("php/includes/database.php");

// Titre de la page
$headTitle = "Admin - Accueil";
// CSS de cette page
$addCSS =  array("");

// JS de cette page
$addJS =  array("");
include("php/includes/head.php");

// Queries de cette page
$addPHP = array("");
include("php/includes/queries/count.php");
include("php/includes/navigator.php");
?>
<?php
	echo $_SESSION['auth']['job'];
	echo "bgruy ghreihgue";
?>
        <!-- main content here -->
    </main>
    <script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>