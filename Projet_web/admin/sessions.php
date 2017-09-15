<?php
include("php/includes/database.php");
// Titre de la page
$headTitle = "Admin - Programmation";
$pageTitle = "Programmation";

// CSS de cette page
$addCSS = array("");

// JS de cette page
$addJS = array("js/form/sessions.js", "js/rowSelection/sessions.js");

// PHP (queries) de cette page
$addPHP = array("queries/select");

include("php/includes/head.php");
include("php/includes/navigator.php");
?>
<main>
    <!--Titre-->
    <div id="titleAndFilter">
        <h2><?php echo $pageTitle; ?></h2>
        <ul>
            <li>
                <a class='inline' href="#add">Ajouter</a>
            </li>
            <li>
                <a class='inline inactiveLink' href="#archive">Archiver</a>
            </li>
        </ul>
    </div>
        <div id="table">
        <table class="tablesaw" data-tablesaw-mode="stack">
            <thead>
                <tr>
                    
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="background-color:#232b2d">Titre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Salle</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="background-color:#232b2d">Date</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="background-color:#232b2d">Horaire</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d"><abbr title="Rotten Tomato Rating">Durée</abbr></th>  
                </tr>
            </thead>
            <tbody>
                
                <?php
                while ($result = $sessionsCompleteList->fetch()) {
                    $result->date;
                    $dateAndHour = $result->date;
                    $dateAndHour = explode(" ", $dateAndHour);
                    $date = new DateTime($dateAndHour[0]);
                    $dateDay = $date->format("w");
                    $dateMonth = $date->format("n");
                    $test = $date->format("d");
                    $jour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $mois = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
                    $date = $jour[$dateDay] . " " . $test . " " . $mois[$dateMonth];
                    $hour = new DateTime($dateAndHour[1]);
                    $hour = $hour->format("g:i");
                    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->title; ?></td>
                        <td><?php echo $result->theater; ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $hour ?></td>
                        <td><?php echo $result->runningTime; ?> min</td> 
                    </tr>
                    <?php
                }
                $sessionsCompleteList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>
    <div style='display:none'>
        <div class="form-style-8" id="add">
            <h2>Ajouter</h2>
            <form method="post" action="" id="addForm" class="formOverflow">

                <label for="idMovie">Films : </label>   
                <select name="idMovie" id="idMovie">    
                    <?php
                    while ($result = $moviesCompleteList->fetch()) {
                        ?>
                        <option value="<?php echo $result->id; ?>"><?php echo $result->title; ?></option>
                        <?php
                    }
                    $moviesCompleteList->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="idTheater">Salle : </label>
                <select name="idTheater" id="idTheater">    
                    <?php
                    while ($result = $theatersCompleteList->fetch()) {
                        ?>
                        <option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
                        <?php
                    }
                    $theatersCompleteList->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="date">Date : </label>
                <input type="datetime-local" name="date" id="date">
                <br/>
                <label for="language">Langue : </label>
                <select name="language" id="language">    
                    <?php
                    while ($result = $languagesCompleteList->fetch()) {
                        ?>
                        <option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
                        <?php
                    }
                    $theatersCompleteList->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="subtitles">Sous-Titre (Oui): </label>
                <input type="radio" name="subtitles" value="yes" id="subtitlestest" class="radio"> <br/>
                <label for="subtitlesNo">Sous-Titre (Non): </label>
                <input type="radio" name="subtitles" value="no" id="subtitles" class="radio" checked> <br/>
                <input type="submit" name="insertSession" value="Ajouter">

            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveSession" id="archiveMovieSubmit" value="Oui">
                <br/>
                <button type="button" id="cancelArchive" >Non</button>
                <br/>
            </form>
        </div>
    </div>

</main>





<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>