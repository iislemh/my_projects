<?php
include("php/includes/database.php");
    
// Titre de la page
$headTitle = "Admin - Membres";
$pageTitle = "Membres";
    
// CSS de cette page
$addCSS = array("");
    
// JS de cette page
$addJS = array("js/form/memberships.js", "js/rowSelection/memberships.js");
    
    
// PHP (queries) de cette page
$addPHP = array("queries/select");
    
include("php/includes/head.php");
include("php/includes/navigator.php");
?>
<?php echo "<main data-session =" . $_SESSION['auth']['job'] . ">" ?>

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
   
 <div id="table">
        <table class="tablesaw" data-tablesaw-sortable data-tablesaw-mode="stack">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="background-color:#232b2d">Pseudonyme</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Email</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="background-color:#232b2d">Pays</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d">Newsletter<abbr title="Rotten Tomato Rating"></abbr></th>   
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $membershipsCompleteList->fetch()) {
                              ?>
                <tr data-id="<?php echo $result->id; ?>">
                    <td class="title"><?php echo $result->username; ?></td>
                    <td><?php echo $result->email; ?></td>
                    <td><?php echo $result->country; ?></td>
                    <td><?php  if($result->newsletter === "Yes"){echo "Inscrit";}else{echo "Non";}; ?></td>
                </tr>
                    <?php
                }
                $membershipsCompleteList->closeCursor();
                ?>
                
            </tbody>
        </table>
    </div>

    <div style='display:none'>
        <div class="form-style-8" id="add">
            <h2>Ajouter</h2>
            <form method="post" action="" id="addForm" autocomplete="off" class="formOverflow"> 
                <label for="member">Adhérent</label>
                <input type="radio" name="membership" value="Member" id="member" class="radio">
                <label for="subscriber">Abonné</label>
                <input type="radio" name="membership" value="Subscriber" id="subscriber" class="radio" checked>
                <br/>
                <label for="newsletterOn">Newsletter(ON)</label>
                <input type="radio" name="newsletter" value="Yes" id="newsletterOn"class="radio">
                <label for="newsletterOff">Newsletter(OFF)</label>
                <input type="radio" name="newsletter" value="No" id="newsletterOff"class="radio" checked>
                <br/>
                <label for="name">Nom : </label>
                <input type="text" name="lastname" id="name" placeholder="Ex : Dupont">
                <br/>
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" placeholder="Ex : Laurent">
                <br/>
                <label for="password">Mot de passe : </label>
                <input type="password" type="password" name="password" id="password" placeholder="Au moins 5 caractères">
                <br/>
                <label for="password2">Retaper le mdp : </label>
                <input type="password" name="password2" id="password2" placeholder="Au moins 5 caractères">
                <br/>
                <label for="username">Pseudo : </label>
                <input type="text" name="username" id="username" placeholder="Ex : laurent_dupont">
                <br/>
                Sexe : 
                <label for="man">Homme</label>
                <input type="radio" name="sex" value="Male" id="man" class="radio">
                <label for="woman">Femme</label>
                <input type="radio" name="sex" value="Female" id="woman"  class="radio" checked>
                <br/>
                <label for="phoneHome">Téléphone Fixe : </label>
                <input type="tel" name="phoneHome" id="phoneHome" placeholder="Ex : +221 01 023 45 87">
                <br/>
                <label for="phoneMobile">Téléphone Mobile : </label>
                <input type="tel" name="phoneMobile" id="phoneMobile" placeholder="Ex : +221 01 023 45 87">
                <br/>
                <label for="neighborhood">Quartier : </label>
                <input type="text" id="neighborhood" name="neighborhood" placeholder="">
                <br/>
                <label for="city">Ville : </label>
                <input type="text" name="city" id="city" placeholder="Dakar">
                <br/>
                <label for="country">Pays : </label>
                <select name="country" id="country">
                    <?php
                    while ($result = $employeeRegionListAdd->fetch()) {
                        ?>
                    <option value="<?php echo $result->id_region; ?>"><?php echo $result->nom_region; ?></option>
                        
                        <?php
                    }
                    $employeeRegionListAdd->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="mail">Email : </label>
                <input type="email" name="email" id="mail" placeholder="Ex : laurent.dupont@gmail.com">
                <br/>
                <label for="status">Statut : </label>
                <select name="status" id="status">
                    <?php
                    while ($result = $statusListAdd->fetch()) {
                        ?>
                    <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        
                        <?php
                    }
                    $statusListAdd->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="activity">Activité : </label>
                <select name="activity" id="activity">
                    <?php
                    while ($result = $activityListAdd->fetch()) {
                        ?>
                    <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        
                        <?php
                    }
                    $activityListAdd->closeCursor();
                    ?>
                </select><br/>
                <input type="submit" class="clearForm" name="InsertMembersOrSubscribers" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" autocomplete="off" class="formOverflow"> 
                <input type="hidden" class="id" name="id">
                <label for="member">Adhérent</label>
                <input type="radio" name="membership" value="Member" class="member" class="radio">
                <label for="subscriber">Abonné</label>
                <input type="radio" name="membership" value="Subscriber" class="subscriber" class="radio" checked>
                <br/>
                <label for="newsletterOn">Newsletter(ON)</label>
                <input type="radio" name="newsletter" value="Yes" class="newsletterOn"class="radio">
                <label for="newsletterOff">Newsletter(OFF)</label>
                <input type="radio" name="newsletter" value="No" class="newsletterOff"class="radio" checked>
                <br/>
                <label for="name">Nom : </label>
                <input type="text" name="lastname" class="lastname" placeholder="Ex : Dupont">
                <br/>
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" class="firstname" placeholder="Ex : Laurent">
                <br/>
                <label for="password">Mot de passe : </label>
                <input type="password" type="password" name="password" class="password" placeholder="Au moins 5 caractères">
                <br/>
                <label for="password2">Retaper le mdp : </label>
                <input type="password" name="password2" class="password2" placeholder="Au moins 5 caractères">
                <br/>
                <!-- <label for="username">Pseudo : </label> -->
                <input type="hidden" name="username" class="username" placeholder="Ex : laurent_dupont">
                <br/>
                Sexe : 
                <label for="man">Homme</label>
                <input type="radio" name="sex" value="Male" class="man" class="radio">
                <label for="woman">Femme</label>
                <input type="radio" name="sex" value="Female" class="woman"  class="radio" checked>
                <br/>
                <label for="phoneHome">Téléphone Fixe : </label>
                <input type="tel" name="phoneHome" class="phoneHome" placeholder="Ex : +221 01 023 45 87">
                <br/>
                <label for="phoneMobile">Téléphone Mobile : </label>
                <input type="tel" name="phoneMobile" class="phoneMobile" placeholder="Ex : +221 01 023 45 87">
                <br/>
                <label for="neighborhood">Quartier : </label>
                <input type="text" class="neighborhood" name="neighborhood" placeholder="">
                <br/>
                <label for="city">Ville : </label>
                <input type="text" name="city" class="city" placeholder="Dakar">
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
                <br/>
                <label for="mail">Email : </label>
                <input type="email" name="email" class="email" placeholder="Ex : laurent.dupont@gmail.com">
                <br/>
                <label for="status">Statut : </label>
                <select name="status" class="status">
                    <option value="" id="actualStatus"></option>
                    <?php
                    while ($result = $statusListModification->fetch()) {
                        ?>
                    <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        
                        <?php
                    }
                    $statusListModification->closeCursor();
                    ?>
                </select>
                <br/>
                <label for="activity">Activité : </label>
                <select name="activity" class="activity">
                    <option value="" id="actualActivity"></option>
                    <?php
                    while ($result = $activityListModification->fetch()) {
                        ?>
                    <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        
                        <?php
                    }
                    $activityListModification->closeCursor();
                    ?>
                </select><br/>
                <input type="submit" class="clearForm" name="updateMembership" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveMembership" id="archiveMovieSubmit" value="Oui">
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