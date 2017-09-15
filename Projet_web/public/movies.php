<?php
// Titre de la page
$headTitle = "Cinewax - Films";

// CSS de cette page
$addCSS =  array("");

// JS de cette page
$addJS =  array("");

// Queries de cette page
$addPHP = array("");
include("php/includes/head.php");
$_SESSION['erreur'] = "";
?>
<ul id="og-grid" class="og-grid">
    
            <?php

            while ($result = $moviesCompleteList->fetch()) {

                $filename = 'resources/imgs/content/movies/'.$result->id.'Poster.jpg';

if (file_exists($filename)) {
    $img = $filename;
} else {
   $rand =  rand(1,2);
   $img = 'resources/imgs/content/movies/defaultPoster'.$rand.'.jpg';
}  
                ?>
    <li>
        <a href="movie-details.php?id=<?php echo $result->id; ?>" data-largesrc="<?php echo $img; ?>" data-title="<?php echo $result->title; ?>" data-releasedate="<?php echo $result->releaseDate; ?>" data-runningtime="<?php echo $result->runningTime; ?>" data-genre="<?php echo $result->genre; ?>" data-realisator="<?php echo $result->realisator; ?>" data-actors="<?php echo $result->realisator; ?>" data-description="<?php echo $result->description; ?>">
            <img src="<?php echo $img; ?>" alt="Poster de <?php echo $result->title; ?>"/>
        </a>
    </li> 
        <?php
    
            }

            $moviesCompleteList->closeCursor();

            ?> 
</ul>

<?php
include("php/includes/scripts.php");
?>

<script src="js/grid.js"></script>
<script>
    $(function() {
        Grid.init();
    });
</script>


</body>
</html>
