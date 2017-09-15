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
                <label for="job">Poste : </label>
                <input type="text" name="job" id="job" placeholder="Ex: Agent d'accueil">
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
                <input type="submit" name="insertEmployee" value="Enregistrer">

            </form>
        </div>
        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" class="formOverflow">
                <input type="hidden" class="id" name="id">
                <label for="name">Nom : </label>   
                <input type="text" name="lastname" class="lastname" placeholder="Ex: Dupont">
                <br/>
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" class="firstname" placeholder="Ex: Laurent">
                <br/>
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
                <label for="job">Poste : </label>
                <input type="text" name="job" class="job" placeholder="Ex: Agent d'accueil">
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
                </select><br/>
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