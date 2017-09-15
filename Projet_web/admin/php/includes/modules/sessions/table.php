  <div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Titre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Salle</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Jour</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Horaire</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"><abbr title="Rotten Tomato Rating">Durée</abbr></th>   
                </tr>
            </thead>
            <tbody>

                <?php
                while ($result = $sessionsCompleteList->fetch()) {
                    $result->date;
                    $dateAndHour = $result->date;
                    $dateAndHour = explode(" ", $dateAndHour);
                    $date = new DateTime($dateAndHour[0]);
                    $dateDay = $date->format("w");
                    $dateMonth = $date->format("n");
                    $test = $date->format("d");
                    $jour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $mois = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
                    $date = $jour[$dateDay] . " " . $test . " " . $mois[$dateMonth];
                    $hour = new DateTime($dateAndHour[1]);
                    $hour = $hour->format("g:i");
                    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->title; ?></td>
                        <td><?php echo $result->theater; ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $hour ?></td>
                        <td><?php echo $result->runningTime; ?> min</td> 
                    </tr>
                    <?php
                }
                $sessionsCompleteList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>
