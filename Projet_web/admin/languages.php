<?php
include("php/includes/database.php");
// Titre de la page
$headTitle = "Admin - Langues";
$pageTitle = "Langues";
    
// CSS de cette page
$addCSS = array("");
    
// JS de cette page
$addJS = array("js/form/languages.js", "js/rowSelection/languages.js");
    
    
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
                <input type="text" name="name" class="name" placeholder="Espagnol">
                <br/>
                <label for="abbreviation">Son abréviation : </label>
                <input type="text" name="abbreviation" class="abbreviation" placeholder="Ex: ES (norme ISO 639-1)">
                <input type="submit" name="insertLanguage" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" class="formOverflow">
                <input type="hidden" class="id" name="id">
                <label for="name">Langue : </label>
                <input type="text" name="name" class="name" placeholder="Espagnol">
                <br/>
                <label for="abbreviation">Son abréviation : </label>
                <input type="text" name="abbreviation" class="abbreviation" placeholder="Ex: ES (norme ISO 639-1)">
                <input type="submit" name="updateLanguage" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>ÃŠtes-vous sÃ»r de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveLanguage" id="archiveMovieSubmit" value="Oui">
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
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Abbrévation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $languageCompleteList->fetch()) {
                    ?>
                <tr data-id="<?php echo $result->id; ?>">
                    <td class="title"><?php echo $result->name; ?></td>
                    <td><?php echo $result->abbreviation; ?></td>
                </tr>
                    <?php
                }
                $languageCompleteList->closeCursor();
                ?>
                    
            </tbody>
        </table>
    </div>
</main>
    
    
    
    
    
<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>