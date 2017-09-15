<?php
// Titre de la page
$headTitle = "Cinewax - Programmation";

// CSS de cette page
$addCSS =  array("");

// JS de cette page
$addJS =  array("");

// Queries de cette page
$addPHP = array("");
include("php/includes/head.php");

 function convertToHoursMins($time, $format = '%02dh%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
$_SESSION['erreur'] = "";
?>
<ul id="og-grid" class="og-grid">
    
<?php

    while ($result = $sessionsCompleteList->fetch()) {

    $filename = 'resources/imgs/content/movies/'.$result->idMovie.'Poster.jpg';
    if (file_exists($filename)) {
        $img = $filename;
    } else {
       $rand =  rand(1,2);
       $img = 'resources/imgs/content/movies/defaultPoster'.$rand.'.jpg';
    }  
    $date = $result->date;
//    $date = date_format($date, 'Y-m-d H:i:s');
//   $date = $date->format('%A %d %B %Y H:i');
    $runningTimeHour = convertToHoursMins($result->runningTime, '%02d h %02d minutes');
?>
    <li class="li_prog">
       <a href="movie-details.php?id=<?php echo $result->idMovie; ?>" data-largesrc="<?php echo $img; ?>" data-title="<?php echo $result->title; ?>" data-releasedate="<?php echo $result->releaseDate; ?>" data-runningtime="<?php echo $result->runningTime; ?>" data-genre="<?php echo $result->genre; ?>" data-realisator="<?php echo $result->realisator; ?>" data-actors="<?php echo $result->realisator; ?>" data-description="<?php echo $result->description; ?>">
            <img src="<?php echo $img; ?>" alt="Poster de <?php echo $result->title; ?>"/>
        </a>
        <div id="text">
            <p style="color:#68D2C3;">Film</p>
            <p style="font-size: 18px;color:rgb(51, 51, 51);"><?php echo $result->title; ?></p>
            <p style="font-size: 14px;color:rgb(51, 51, 51);"><?php echo $result->genre; ?></p>
            <p style="font-size: 14px;color:rgb(51, 51, 51);">De <?php echo $result->realisator; ?></p>
            <p style="font-size: 14px;color:rgb(51, 51, 51);"><?php echo $result->runningTime; ?> min (<?php echo $runningTimeHour; ?>)</p>
            <p style="color:#68D2C3;"><?php echo strftime('%Y-%m-%d %H:%M:%S', date('Y-m-d H:i:s',strtotime($date)));?></p>            
            <?php echo '<a href="reservation.php?id=' . $result->id . '">' ?><p style="color:#68D2C3;">Réservation</p></a>  
         </div>
    </li>




    <?php
}
$sessionsCompleteList->closeCursor();
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
