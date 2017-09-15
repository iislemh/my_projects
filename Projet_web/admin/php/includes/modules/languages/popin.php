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
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveLanguage" id="archiveMovieSubmit" value="Oui">
                <br/>
                <button type="button" id="cancelArchive" >Non</button>
                <br/>
            </form>
        </div>
    </div>