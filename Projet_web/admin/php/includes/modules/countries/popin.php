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