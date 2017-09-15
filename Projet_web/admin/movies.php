<?php
include("php/includes/database.php");
    
// Titre de la page
$headTitle = "Admin - Film";
$pageTitle = "Films";
// CSS de cette page
$addCSS = array("");
    
// JS de cette page
$addJS = array("js/form/movies.js","js/rowSelection/movies.js", "js/ajaxupload.3.5.js");
    
// PHP (queries) de cette page
$addPHP = array("queries/select");
    
include("php/includes/head.php");
include("php/includes/navigator.php");
?>
<script type="text/javascript" >
    $(function(){       
        $(".picturePoster").click(function() {
            $title = $("#selected").data("id");
            $type = "Poster";
            
            var btnUpload=$('.uploadPoster');
            var status=$('#status');
            new AjaxUpload(btnUpload, {
                action: 'php/uploads/upload-file.php',
                name: 'uploadfile',
                onSubmit: function(file, ext){    
                    if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                        // extension is not allowed 
                        status.text('Only JPG, PNG or GIF files are allowed');
                        return false;
                    }
                    status.text('Uploading...');
                },
                data: {title: $title, type: $type},
                onComplete: function(file, response){
                    //On completion clear the status
                    status.text('');
                    //Add uploaded file to list
                    if(response==="success"){
                        alert("Success ! :)");
                    } else{
                        alert("Failure ! :(");
                    }
                }
            });
            
        });
        
        $(".pictureCover").click(function() {
            $title = $("#selected").data("id");
            $type = "Cover";
            
            var btnUpload=$('.uploadCover');
            var status=$('#status');
            new AjaxUpload(btnUpload, {
                action: 'php/uploads/upload-file.php',
                name: 'uploadfile',
                onSubmit: function(file, ext){    
                    if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                        // extension is not allowed 
                        status.text('Only JPG, PNG or GIF files are allowed');
                        return false;
                    }
                    
                    status.text('Uploading...');
                },
                data: {title: $title, type: $type},
                onComplete: function(file, response){
                    //On completion clear the status
                    status.text('');
                    //Add uploaded file to list
                    if(response==="success"){
                        alert("Success ! :)");
                    } 
                    // else{
                    //     alert("Failure ! :(");
                    // }
                }
            });
            
        });
        
    });
</script>
<main>
    <!--Titre-->
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

        
    <!--Tableau-->
    <div id="table">
        <table class="tablesaw" data-tablesaw-sortable data-tablesaw-mode="stack">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="background-color:#232b2d">Titre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="background-color:#232b2d" data-tablesaw-priority="1">Genre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="background-color:#232b2d">Année de sortie</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d"><abbr title="Rotten Tomato Rating">Durée</abbr></th>   
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" style="background-color:#232b2d">Images</th>   
                </tr>
            </thead>
            <tbody>
            <?php
            while ($result = $moviesCompleteList->fetch()) {
                ?>
                <tr data-id="<?php echo $result->id; ?>">
                    <td class="title"><?php echo $result->title; ?></td>
                    <td><?php echo $result->genre; ?></td>
                    <td><?php echo $result->releaseDate; ?></td>
                    <td><?php echo $result->runningTime; ?> min</td> 
                    <td>
                        <a href="#picturePoster" class='inline inactiveLink picturePoster' ><img src="resources/imgs/layout/pictureGrey.png"/></a>
                        <a href="#pictureCover" class='inline inactiveLink pictureCover' ><img src="resources/imgs/layout/pictureGrey.png"/></a>
                    </td> 
                </tr>
                <?php
            }
            $moviesCompleteList->closeCursor();
            ?>    
            </tbody>
        </table>
    </div>
        
    <!--Popin-->
   <div style='display:none'>
        <div class="form-style-8" id="add">
            <h2>Ajouter</h2>
            <form method="post" action="" id="addForm" class="formOverflow">
                <label for="title">Titre : </label>   
                <input type="text" name="title" class="title" placeholder="Ex : Fight Club">
                <br/>
                <label for="originalTitle">Titre original : </label>
                <input type="text" name="titleOriginal" class="originalTitle" placeholder="Ex : Fight Club">
                <br/>
                <label for="realisator">Réalisateur : </label>
                <input type="text" name="realisator" class="realisator"placeholder="Ex: David Fincher">
                <br/>
                <label for="plot">Synopsis : </label>
                <input type="text" name="plot" class="plot" placeholder="Lorem ipsum">
                <br/>
                <label for="actors">Acteurs : </label>
                <input type="text" name="actors" class="actors"placeholder="Ex : Edward Norton, Brad Pitt, Helena Bonham Carter">
                <br/>
                <label for="country">Pays : </label>
                <select name="country" class="genre">
                    <option value="" disabled selected>Select your option</option>
                    <?php
                    while ($result = $countriesCompleteList->fetch()) {
                        ?>
                        <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        <?php
                    }
                    $countriesCompleteList->closeCursor();
                    ?>
                </select>
                <br>
                <label id="type">Bande Annonce : </label>
                <input type="text" name="type" class="type" placeholder="Type">
                <br/>
                <label for="genre">Genre : </label>
                <select name="genre" class="genre">    
                    <?php
                    while ($result = $genresListAdd->fetch()) {
                        ?>
                        <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        <?php
                    }
                    $genresListAdd->closeCursor();
                    ?>
                </select>

                <br/>
                <label for="date">Date de sortie : </label>
                <input type="date" name="releaseDate" class="date" placeholder="Ex : 1999">
                <br/>
                <label for="time">Durée : </label>
                <input type="number" name="runningTime" class="time" placeholder="Ex : 139">
                <br/>
                <label for="prod">Production : </label>
                <input type="text" name="production" class="prod" placeholder="Ex : Fox 2000 Pictures">
                <br/>
                <label>Distribution : </label>
                <input type="text" name="distribution" class="distribution" placeholder="Ex : Distribution">
                <br/>
                <label for="language">Langue : </label>
                <input type="text" name="language" class="language" placeholder="Ex : US">
                <br/>
                <label for="warning">Interdiction : </label>
                <input type="text" name="warning" class="warning"placeholder="Ex : -12">
                <br/>
                <input type="submit" name="insertMovie" id="insertMovieSubmit" value="Enregistrer">
            </form>
        </div>
        <div class="form-style-8" id="modify">
            <h2>Modifier</h2>
            <form method="post" action="" id="modificationForm" class="formOverflow">
                <input type="hidden" class="id" name="id">
                <label for="title">Titre : </label>   
                <input type="text" name="title" class="title" placeholder="Ex : Fight Club">
                <br/>
                <label for="originalTitle">Titre original : </label>
                <input type="text" name="titleOriginal" class="titleOriginal" placeholder="Ex : Fight Club">
                <br/>
                <label for="realisator">Réalisateur : </label>
                <input type="text" name="realisator" class="realisator"placeholder="Ex: David Fincher">
                <br/>
                <label for="plot">Synopsis : </label>
                <input type="text" name="plot" class="plot" placeholder="Lorem ipsum">
                <br/>
                <label for="actors">Acteurs : </label>
                <input type="text" name="actors" class="actors"placeholder="Ex : Edward Norton, Brad Pitt, Helena Bonham Carter">
                <br/>
                <select name="country" class="genre">
                    <option value="" id="actualCountry"></option>
                    <?php
                    while ($result = $countriesListModification->fetch()) {
                        ?>
                    <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        <?php
                    }
                    $countriesListModification->closeCursor();
                    ?>
                </select>
                <br>
                <label id="type">Bande Annonce : </label>
                <input type="text" name="type" class="type" placeholder="Type">
                <br/>
                <label for="genre">Genre : </label>
                <select name="genre" class="genre">
                    <option value="" id="actualGenre"></option>
                    <?php
                    while ($result = $genresListModification->fetch()) {
                        ?>
                    <option value="<?php echo $result->name; ?>"><?php echo $result->name; ?></option>
                        <?php
                    }
                    $genresListModification->closeCursor();
                    ?>
                </select>
                    
                <br/>
                <label for="date">Date de sortie : </label>
                <input type="date" name="releaseDate" class="releaseDate" placeholder="Ex : 1999">
                <br/>
                <label for="time">Durée : </label>
                <input type="number" name="runningTime" class="runningTime" placeholder="Ex : 139">
                <br/>
                <label for="prod">Production : </label>
                <input type="text" name="production" class="production" placeholder="Ex : Fox 2000 Pictures">
                <br/>
                <label>Distribution : </label>
                <input type="text" name="distribution" class="distribution" placeholder="Ex : Distribution">
                <br/>
                <label for="language">Langue : </label>
                <input type="text" name="language" class="language" placeholder="Ex : US">
                <br/>
                <label for="warning">Interdiction : </label>
                <input type="text" name="warning" class="warning"placeholder="Ex : -12">
                <br/>
                <input type="submit" name="updateMovie" id="modificationMovieSubmit" value="Enregistrer">
                    
            </form>
        </div>
        <div class="form-style-8" id="archive">
            <h2>Archiver</h2>
            <form method="post" action="" id="archiveForm" class="formOverflow">
                <p>Êtes-vous sûr de vouloir archiver ce film ?</p>
                <br/>
                <input type="hidden" class="id" name="id">
                <input type="submit" name="archiveMovie" id="archiveMovieSubmit" value="Oui">
                <br/>
                <button type="button" id="cancelArchive" >Non</button>
                <br/>
            </form>
        </div>
        <div class="form-style-8" id="picturePoster">
            <h2>Image du film JPG de 320*453</h2>
            <div class="uploadPoster" >
                <span>Ajouter affiche</span>
            </div>
            <span id="status" ></span>
        </div>
            
        <div class="form-style-8" id="pictureCover">
            <h2>Image de couverture</h2>
            <div class="uploadCover" >
                <span>Ajouter affiche</span>
            </div>
            <span id="status" ></span>
        </div>
    </div>

</main>
<script src="js/layoutNavigator.js"></script> <!-- Resource jQuery -->
</body>
</html>