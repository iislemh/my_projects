<?php
session_start();
if (!isset($_SESSION['auth']) && count($_SESSION['auth']) != 11) {
    header("location:index.php");
    exit;
}

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
<html lang="fr">
    <head>
        <title><?php echo $headTitle; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
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
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="css/table.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <link rel="stylesheet" href="css/colorbox.css" />
        <?php
        if (count($css) > 0 && $css[0] != "") {
            for ($i = 0; $i < count($css); $i++) {
                echo '<link rel="stylesheet" href="' . $css[$i] . '">';
            }
        }
        ?>

        <!--JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="js/modernizr.js"></script>
        <script src="js/formVerification.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/tablesaw.js"></script>
        <script src="js/jquery.colorbox.js"></script>
        <script src="js/ajaxupload.3.5.js" ></script>
        <?php
        if (count($js) > 0 && $js[0] != "") {
            for ($i = 0; $i < count($js); $i++) {
                echo '<script src="' . $js[$i] . '"></script>';
            }
        }
        ?>        


        <script>
            $(document).ready(function() {
                //Examples of how to assign the Colorbox event to elements
                $(".inline").colorbox({inline: true});
                    
    $('#archive button#cancelArchive').click(function(){
    $('#cboxClose').click();
});
            });
        </script>
    </head>