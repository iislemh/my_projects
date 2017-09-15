<?php
include("php/includes/database.php");
    
// Titre de la page
$headTitle = "Admin - Pays";
$pageTitle = "Pays";
    
// CSS de cette page
$addCSS = array("");
    
// JS de cette page
$addJS = array("js/form/countries.js","js/rowSelection/countries.js");
    
    
// PHP (queries) de cette page
$addPHP = array("queries/select");
    
include("php/includes/head.php");
include("php/includes/navigator.php");
?>



<main>
    <div id="titleAndFilter">
        <h2><?php echo $pageTitle;?></h2>
        <ul>
            <li>
                <a class='inline' href="#add">Ajouter</a>
            </li>
            <li>
                <a class='inline inactiveLink' href="#modify">Modifier</a>
            </li>
            <li>
                <a class='inline inactiveLink' href="#archive">Archiver</a>
            </li>
        </ul>
    </div>
    <div style='display:none'>
        <div class="form-style-8" id="add">
            <h2>Ajouter</h2>
            <form method="post" action="" id="addForm" class="formOverflow">
                <label for="name">Langue : </label>
                <input type="text" name="name" class="name" placeholder="Espagne">
                <br/>
                <label for="abbreviation">Son abréviation : </label>
                <input type="text" name="abbreviation" class="abbreviation" placeholder="Ex: ES (alpha-2)">
                <input type="submit" name="insertCountry" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" class="formOverflow">
                <input type="hidden" class="id" name="id">
                <label for="name">Langue : </label>
                <input type="text" name="name" class="name" placeholder="Espagne">
                <br/>
                <label for="abbreviation">Son abréviation : </label>
                <input type="text" name="abbreviation" class="abbreviation" placeholder="Ex: ES (alpha-2)">
                <input type="submit" name="updateCountry" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveCountry" id="archiveMovieSubmit" value="Oui">
                <br/>
                <button type="button" id="cancelArchive" >Non</button>
                <br/>
            </form>
        </div>
    </div>
    <div id="table">
        <table class="tablesaw" data-tablesaw-sortable data-tablesaw-mode="stack">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="background-color:#232b2d">Pays</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Abbr�vation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $countriesCompleteList = $dbh->query("SELECT * FROM cw_medias_countries  WHERE archive = 'false'");
                // $countriesCompleteList->setFetchMode(PDO::FETCH_OBJ);
                while ($result = $countriesCompleteList->fetch()) {
                    
                   echo "<tr data-id='" . $result->id . "'>
                    <td class='title'>" . $result->name . "</td>
                    <td>" . $result->abbreviation . "</td>
                </tr>";
                }
                // $countriesCompleteList->closeCursor();
                ?>
                
            </tbody>
        </table>
    </div>
</main>





<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>