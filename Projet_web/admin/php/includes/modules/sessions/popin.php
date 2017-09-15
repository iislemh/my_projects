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