   <div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" >Titre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col  data-tablesaw-priority="1">Genre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" >Année de sortie</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" ><abbr title="Rotten Tomato Rating">Durée</abbr></th>   
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" >Affiche</th>   
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3" >Couverture</th>   
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
                    </td> 
                    <td>
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