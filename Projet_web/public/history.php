<?php
// Titre de la page
$headTitle = "Cinewax - L'histoire";

// CSS de cette page
$addCSS =  array("");

// JS de cette page
$addJS =  array("");

// Queries de cette page
$addPHP = array("");
include("php/includes/head.php");
$_SESSION['erreur'] = "";
?>

<div class="history-container">
    <div id="history-img">
        <img src="resources/imgs/content/historyCover.jpg" style="width: 100%">
    </div>
    <div id="history-text">
        <h2 class="clip-text clip-text_one">Histoire</h2>
        <br>
        <h3>Le projet</h3>
        <p>Créé en 2014 le projet et association Cinewax a pour objectif de construire un réseau de cinéclubs de quartier solidaire et innovants ayant un impact culturel, social et économique local. 
            <br><br>Notre zone d'implantation est le Sénégal ainsi que les pays d'Afrique de l'Ouest où il n'existe plus de cinéma.  Des films classiques, cultes, aux films documentaires et films d'animation, notre ambition est de montrer la meilleure qualité et le cinéma dans sa diversité, et de montrer la culture cinématographique internationale !</p>
        <p><br>Nous avons des activités en France et au Sénégal, découvrez nos actions sur notre page <a href="https://www.facebook.com/Cinecinewax" style="color: #68D2C3">facebook</a>. </p>
        
    </div>
    <div id="history-text2">
        <h3>Constat</h3>
        <p>Le cinéma est un véritable luxe dans certains pays, et nous voulons permettre aux populations d'y accéder à un prix raisonnable, tout en offrant du travail grâce aux profits générés par nos salles ! Découvrez tout le projet <a href="http://cinewax.org" style="color: #68D2C3">ici</a> !<br><br></p>
        <h3>Notre initiative</h3>
        <p>Notre idée est donc de créer des espaces en deux parties composées d'un cinéclub et d'un espace de rencontre. Nous voulons créer un véritable lieu d'échange culturel favorisant la culture locale et bénéficiant aux quartiers dans lesquelles ils sont implantés.<br><br></p>
        <p>Après une campagne de crowdfunding en janvier 2015, nous avons réuni 7500€ et avons pu acheter notre matériel de projection et l'emmener au Sénégal. Nous avons commencé notre activité en mars 2015 à Dakar et nous continuons aujourd'hui de réaliser des séances dans les quartiers et d'étendre notre réseau de salles.
            Cinewax veut aussi promouvoir le cinéma africain en France, qui reste aujourd'hui encore à l'écart de nos écrans! Notre idée est donc de réaliser des séances de cinéma africain (en région parisienne dans un premier temps).
        </p>
    </div>
    
</div>

<!--main-->





<?php
include("php/includes/scripts.php");
?>

<!--scripts Js-->

<script src="js/jquery.catslider.js"></script>
<script>
    $(function() {

        $( '#mi-slider' ).catslider();

    });
</script>


</body>
</html>
