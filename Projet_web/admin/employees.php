<?php
include("php/includes/database.php");

// Titre de la page
$headTitle = "Admin - Employés";
$pageTitle = "Employés";

// CSS de cette page
$addCSS = array("");

// JS de cette page
$addJS = array("js/form/employees.js", "js/rowSelection/employees.js");


// PHP (queries) de cette page
$addPHP = array("queries/select");

include("php/includes/head.php");
include("php/includes/navigator.php");
?>
<main>
    <!--Titre-->
    <div id="titleAndFilter">
        <h2><?php echo $pageTitle; ?></h2>
        <?php
        if($_SESSION['auth']['job'] < 7)
        {
         echo "<ul>
         <li>
         <a class='inline' href='#add'>Ajouter</a>
         </li>
         <li>
         <a class='inline inactiveLink' href='#modify'>Modifier</a>
         </li>
         <li>
         <a class='inline inactiveLink' href='#archive'>Archiver</a>
         </li>
         </ul>";
     }
     ?>
 </div>

    <div style='display:none'>


        <div class="form-style-8" id="add">
            <h2>Ajouter</h2>
            <form method="post" action="" id="addForm" class="formOverflow">
                <label for="name">Nom : </label>   
                <input type="text" name="lastname" id="name" placeholder="Ex: Dupont">
                <br/>
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" placeholder="Ex: Laurent">
                <br/>
                <label for="mail">Mot de passe : </label>
                <input type="password" name="password" id="password" placeholder="Au moins 5 caractères" pattern=".{5,}">
                <br>
                <label for="birth">Date de naissance : </label>
                <input type="date" name="birthDate" placeholder="naissance" id="birth">
                <br/>
                Sexe : 
                <label for="man">Homme</label>
                <input type="radio" name="sex" value="Male" id="man" class="radio">
                <label for="woman">Femme</label>
                <input type="radio" name="sex" value="Female" id="woman" class="radio" checked>
                <br/>
                <label for="address">Adresse : </label>
                <input type="text" name="address" id="address" placeholder="Ex: 5 place de la République">
                <br/>
                <label for="city">Ville : </label>
                <input type="text" name="city" placeholder="Dakar" id="city">
                <br/>
                <label for="phoneHome">Téléphone fixe : </label>
                <input type="tel" name="phoneHome" id="phoneHome" placeholder="Ex: +221 01 023 45 87">
                <br/>
                <label for="phoneMobile">Téléphone mobile : </label>
                <input type="tel" name="phoneMobile" id="phoneMobile"placeholder="Ex: +221 01 023 45 87">
                <br/>
                <label for="mail">Email : </label>
                <input type="email" name="email" id="mail" placeholder="Ex: laurent.dupont@gmail.com">
                <br/>
                job : 
                <?php

                if($_SESSION['auth']['job'] == 1)
                {
                    echo '<br><br><label for="adminregion">Administrateur régional</label>
                    <input type="radio" name="job" value="2" id="region" class="radio"><br>
                    <label for="modoprog">Modérateur Programmation et salle</label>
                    <input type="radio" name="job" value="3" id="modoprog" class="radio"><br>
                    <label for="modomembres">Modérateur Membres</label>
                    <input type="radio" name="job" value="4" id="modomembre" class="radio"><br>
                    <label for="modoempl">Modérateur Employés</label>
                    <input type="radio" name="job" value="5" id="modoempl" class="radio"><br>
                    <label for="modocaisse">Modérateur Caisse</label>
                    <input type="radio" name="job" value="6" id="modocaisse" class="radio"><br>';                
                }

                echo '<label for="employe">Employé</label>
                <input type="radio" name="job" value="7" id="employe" class="radio" checked><br>';          
                ?>
                <br/>
                <label for="status">Statut : </label>
                <select name="status" id="status">
                    <?php
                    while ($result = $employeeStatusListAdd->fetch()) {
                        ?>
                        <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>

                        <?php
                    }
                    $employeeStatusListAdd->closeCursor();
                    ?>
                </select><br/>
                <label for="country">Région : </label>
                <select name="country" id="country">
                    <?php
                    while ($result = $employeeRegionListAdd->fetch()) {
                        ?>
                        <option value="<?php echo $result->id_region; ?>"><?php echo $result->nom_region; ?></option>

                        <?php
                    }
                    $employeeRegionListAdd->closeCursor();
                    ?>
                </select><br/>
                <input type="submit" name="insertEmployee" value="Enregistrer">

            </form>
        </div>

        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" class="formOverflow">
                <input type="hidden" class="id" name="id">
                <label for="lastname">Nom : </label>   
                <input type="text" name="lastname" class="lastname" placeholder="Ex: Dupont">
                <br/>
                <!-- <label for="firstname">Prénom : </label> -->
                <input type="hidden" name="firstname" class="firstname" placeholder="Ex: Laurent">
                <br/>
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" placeholder="Au moins 5 caractères" pattern=".{5,}">
                <br>
                <label for="birth">Date de naissance : </label>
                <input type="date" name="birthDate" class="birthDate" placeholder="naissance">
                <br/>
                Sexe : 
                <label for="man">Homme</label>
                <input type="radio" name="sex" class="sex" value="Male" class="man" class="radio">
                <label for="woman">Femme</label>
                <input type="radio" name="sex" class="sex" value="Female" class="woman" class="radio" checked>
                <br/>
                <label for="address">Adresse : </label>
                <input type="text" name="address" class="address" placeholder="Ex: 5 place de la République">
                <br/>
                <label for="city">Ville : </label>
                <input type="text" name="city" class="city" placeholder="Dakar">
                <br/>
                <label for="phoneHome">Téléphone fixe : </label>
                <input type="tel" name="phoneHome" class="phoneHome" placeholder="Ex: +221 01 023 45 87">
                <br/>
                <label for="phoneMobile">Téléphone mobile : </label>
                <input type="tel" name="phoneMobile" class="phoneMobile"placeholder="Ex: +221 01 023 45 87">
                <br/>
                <label for="email">Email : </label>
                <input type="email" name="email" class="email" placeholder="Ex: laurent.dupont@gmail.com">
                <br/>
                job : 
                <?php

                if($_SESSION['auth']['job'] == 1)
                {
                    echo '<br><br><label for="adminregion">Administrateur régional</label>
                    <input type="radio" name="job" value="2" id="region" class="radio"><br>';
                }
                if($_SESSION['auth']['job'] <= 2)
                {
                    echo '<label for="modoprog">Modérateur Programmation et salle</label>
                    <input type="radio" name="job" value="3" id="modoprog" class="radio"><br>
                    <label for="modomembres">Modérateur Membres</label>
                    <input type="radio" name="job" value="4" id="modomembre" class="radio"><br>
                    <label for="modoempl">Modérateur Employés</label>
                    <input type="radio" name="job" value="5" id="modoempl" class="radio"><br>
                    <label for="modocaisse">Modérateur Caisse</label>
                    <input type="radio" name="job" value="6" id="modocaisse" class="radio"><br>';                
                }

                echo '<label for="employe">Employé</label>
                <input type="radio" name="job" value="7" id="employe" class="radio" checked><br>';          
                ?>
                <br/>
                <label for="status">Statut : </label>
                <select name="status" class="status">
                    <option value="" id="actualStatus"></option>
                    <?php
                    while ($result = $employeeStatusListModification->fetch()) {
                        ?>
                        <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>

                        <?php
                    }
                    $employeeStatusListModification->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="country">Pays : </label>
                <select name="country" class="country">
                    <?php
                    while ($result = $employeeRegionListModification->fetch()) {
                        ?>
                        <option value="<?php echo $result->id_region; ?>"><?php echo $result->nom_region; ?></option>
                        
                        <?php
                    }
                    $employeeRegionListModification->closeCursor();
                    ?>
                </select>
                <input type="submit" name="updateEmployee" value="Enregistrer">

            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveEmployee" id="archiveMovieSubmit" value="Oui">
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
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Prénom</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="background-color:#232b2d">Job</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d">Mail</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d">Statut</th>   

                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $employeesCompleteList->fetch()) {
                    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->lastname; ?></td>
                        <td><?php echo $result->firstname; ?></td>
                        <td><?php 
                        
                        $categorie2 = $dbh->query('SELECT * FROM job WHERE id_job = "' . $result->job . '"');

                        while ($idk2 = $categorie2->fetch())
                        {
                            echo $idk2['description'];
                        }

                        $categorie2->closeCursor();

                        ?></td>
                        <td><?php 
                        if($_SESSION['auth']['job'] == 1 || $_SESSION['auth']['job'] == 2)
                            echo $result->email;
                        else if (($_SESSION['auth']['job'] >= 3 && $result->job >= 3) && ($_SESSION['auth']['job'] <= 6 && $result->job >= 3))
                            echo $result->email;
                        else if($_SESSION['auth']['job'] == 7 && $result->job == 7)
                            echo $result->email;
                        else
                            echo "Vous n'avez pas les permissions pour voir cette adresse mail.";

                        ?></td>
                        <td><?php echo $result->status; ?></td>
                    </tr>
                    <?php
                }
                $employeesCompleteList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>
</main>





<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>