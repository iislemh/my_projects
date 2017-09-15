<?php
include("php/includes/database.php");
    
// Titre de la page
$headTitle = "Admin - Salles";
$pageTitle = "Salles";
    
// CSS de cette page
$addCSS = array("");
    
// JS de cette page
$addJS = array("js/form/theaters.js", "js/rowSelection/theaters.js");
    
    
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
                <label>Nom : </label>   
                <input type="text" name="name" placeholder="Ex : Léopold Sédar Senghor">
                <br/>
                <label>Nombres de places assises : </label>
                <input type="text" name="numberOfPlace" placeholder="Ex : 235">
                <br/>
                <label>Adresse : </label>
                <input type="text" name="address" placeholder="Ex : 5 place de la république">
                <br/>
                <label>Téléphone : </label>
                <input type="text" name="phone" placeholder="Ex : +221 01 023 45 87">
                <br/>
                <label for="country">Pays : </label>
                    <select name="country" id="country">
                    <?php

                $employeeRegionListAdd = $dbh->query("SELECT * FROM region");
                $employeeRegionListAdd->setFetchMode(PDO::FETCH_OBJ);
                    while ($result = $employeeRegionListAdd->fetch()) {
                        echo '<option value="' . $result->id_region . '">' . $result->nom_region . '</option>';                        
                    }
                    $employeeRegionListAdd->closeCursor();
                    ?>
                </select>
                <br/>
                <input type="submit" name="insertTheater" value="Enregistrer">                    
            </form>
        </div>
        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" class="formOverflow">
                <input type="hidden" class="id" name="id">
                <label>Nom : </label>   
                <input type="text" name="name" class="name" placeholder="Ex : Léopold Sédar Senghor">
                <br/>
                <label>Nombres de places assises : </label>
                <input type="text" name="numberOfPlace" class="numberOfPlace" placeholder="Ex : 235">
                <br/>
                <label>Adresse : </label>
                <input type="text" name="address" class="address" placeholder="Ex : 5 place de la république">
                <br/>
                <label>Téléphone : </label>
                <input type="text" name="phone" class="phone" placeholder="Ex : +221 01 023 45 87">
                <br/>
                <label for="country">Pays : </label>
                    <select name="country" id="country">
                    <?php

                $employeeRegionListAdd = $dbh->query("SELECT * FROM region");
                $employeeRegionListAdd->setFetchMode(PDO::FETCH_OBJ);
                    while ($result = $employeeRegionListAdd->fetch()) {
                        echo '<option value="' . $result->id_region . '">' . $result->nom_region . '</option>';                        
                    }
                    $employeeRegionListAdd->closeCursor();
                    ?>
                <br/>
                <input type="submit" name="updateTheater" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveTheater" id="archiveMovieSubmit" value="Oui">
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
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="background-color:#232b2d">Nom</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Nombre de places</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="background-color:#232b2d">Adresse</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d">Téléphone</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $theaterCompleteList->fetch()) {
                    ?>
                <tr data-id="<?php echo $result->id; ?>">
                    <td class="title"><?php echo $result->name; ?></td>
                    <td><?php echo $result->numberOfPlace; ?></td>
                    <td><?php echo $result->address; ?></td>
                    <td><?php echo $result->phone; ?></td>
                </tr>
                    <?php
                }
                $theaterCompleteList->closeCursor();
                ?>
            </tbody>
        </table>
    </div>
</main>
<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>