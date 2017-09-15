<?php

session_start();

include("php/includes/database.php");
include("php/queries/select.php");
include("php/queries/count.php");

// Fichiers CSS/JS/PHP ajoutés
$css = $addCSS;
$js = $addJS;
$php = $addPHP;

if (count($php) > 0 && $php[0] != "") {
    for ($i = 0; $i < count($php); $i++) {
        include("php/" . $php[$i] . ".php");
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Cinewax - Site public</title>
    <link rel="apple-touch-icon" sizes="57x57" href="resources/imgs/layout/favicon-apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="resources/imgs/layout/favicon-apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="resources/imgs/layout/favicon-apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="resources/imgs/layout/favicon-apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="resources/imgs/layout/favicon-apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="resources/imgs/layout/favicon-apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="resources/imgs/layout/favicon-apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="resources/imgs/layout/favicon-apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="resources/imgs/layout/favicon-apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="resources/imgs/layout/favicon-android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/imgs/layout/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="resources/imgs/layout/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/imgs/layout/favicon-16x16.png">
    <link rel="icon" type="image/png" href="resources/imgs/layout/favicon.png" />
    <!--CSS-->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css/defaultResponsive.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/componentResponsive.css" />
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>
    <?php
    if (count($css) > 0 && $css[0] != "") {
        for ($i = 0; $i < count($css); $i++) {
            echo '<link rel="stylesheet" href="' . $css[$i] . '">';
        }
    }
    ?>
    
    <!--JavaScript-->
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="js/handlebars-v4.0.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--        <script src="js/jquery-2.1.1.js"></script>-->
    <script src="js/layoutNavigator.js"></script>
    <script src="js/jquery.adaptive-backgrounds.js"></script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>   
    <?php
    if (count($js) > 0 && $js[0] != "") {
        for ($i = 0; $i < count($js); $i++) {
            echo '<script src="' . $js[$i] . '"></script>';
        }
    }
    ?>
    
</head>

<body>
    <header>
        <h1 id="logo"><a href="index.php">Cinewax</a></h1>
        
        <nav class="cd-main-nav-wrapper">
            <ul class="cd-main-nav">
                <!--<li><a href="#0">About</a></li>-->
                <li>
                    <?php

                    if(!isset($_SESSION['email']))
                        echo '<a href="#0" class="cd-subnav-trigger"><span>Reseaux sociaux</span></a>';
                    else
                        echo '<a href="espace_membre.php"><span>Espace Membre</span></a>';

                    ?>
                    <ul>
                        <li class="go-back"><a href="#0">Menu</a></li>
                        <li><a href="https://www.facebook.com/Cinecinewax" target="_blank"><img src="resources/imgs/layout/iconFacebook.png"/></a></li>
                        <li><a href="https://www.youtube.com/watch?v=TwRYodNcBwY" target="_blank"><img src="resources/imgs/layout/iconYoutube.png"/></a></li>
                        <li style="margin-right: 50px;"><a href="https://twitter.com/Lecinewax" target="_blank"><img src="resources/imgs/layout/iconTwitter.png"/></a></li>
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
                    </ul>
                </li>
            </ul> <!-- .cd-main-nav -->
        </nav> <!-- .cd-main-nav-wrapper -->
        
        <a href="#0" class="cd-nav-trigger"><span></span></a>
        <div class="container demo-1">
            <!-- Codrops top bar -->
            <div class="main clearfix">
                <div class="column">
                    <div id="dl-menu" class="dl-menuwrapper">
                        <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                            <li>
                                <a href="#">Le Cinéma</a>
                                <ul class="dl-submenu">
                                    <li>
                                        <a href="#">Programmation
                                            <span>
                                              
                                            </span>
                                        </a>
                                    </li>
                                    <li><a href="#">Films disponibles<span>
                                        
                                    </span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">L'association</a>
                                <ul class="dl-submenu">
                                    <li><a href="history.php">L'histoire</a></li>
                                    <li><a href="team.php">L'équipe</a></li>
                                    <li><a href="subscribe.php">Adhérer</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Informations</a>
                                <ul class="dl-submenu">
                                    <li><a href="theaters.php">Nos Salles<span>34</span></a></li>
                                    <li><a href="access.php">Contact & Accès</a></li>
                                    <li><a href="rate.php">Tarifs</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /dl-menuwrapper -->
                </div>
            </div>
        </div><!-- /container -->
        
        
    </header>
    
    <aside>


        <nav id="staffPanel">
            <ul>
                <?php 
                if ($_SESSION['email'])
                    echo '<li>Bonjour, ' . $_SESSION['firstname'] . ' </li>'; ?>
                <br />
                <li>Programmation
                    <ul>
                        <li><a href="programmation.php">Séances
                            <span>    <?php while ($result = $countCinemaSessions->fetch()) {

                                echo $result->count;

                            } $countCinemaSessions->closeCursor(); ?>
                        </span>   </a>
                    </li>
                    
                    <li><a href="movies.php">Général
                        <span> 
                            <?php while ($result = $countMediasMovies->fetch()) {

                                echo $result->count;

                            } $countMediasMovies->closeCursor(); ?>
                        </span>
                    </a>
                </li>
                
            </ul>
        </li>
        <li>L'ASSOCIATION
            <ul>
                <li><a href="history.php">Histoire</a>
                </li>
                <li><a href="team.php">L'équipe</a>
                </li>
                <li><a href="subscribe.php">Adhérer</a>
                </li>
            </ul>
        </li>
        <li>INFORMATIONS
            <ul>
                <li><a href="theaters.php">Nos Salles <span><?php while ($result = $countCinemaTheaters->fetch()) {

                    echo $result->count;

                } $countCinemaTheaters->closeCursor(); ?></span></a></li>
                <li><a href="access.php">Contact & Accès</a></li>
                <li><a href="rate.php">Tarifs</a></li>
                <br />
                <?php
                if(!isset($_SESSION['email']))
                    echo '<li><a href="inscription.php">Créer un compte</a><br />
                <p>ou</p><br />
                <a href="identification.php">Se connecter</a></li>';
                else
                    echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
                ?>
            </ul>
        </li>
    </ul>
    <div class="fb-page" data-href="https://www.facebook.com/Cinecinewax/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Cinecinewax/"><a href="https://www.facebook.com/Cinecinewax/">Cinewax</a></blockquote></div></div>
</nav>
</aside>

<main>
