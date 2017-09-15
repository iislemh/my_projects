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