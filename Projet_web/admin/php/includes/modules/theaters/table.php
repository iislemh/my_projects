<div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nom</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Nombre de places</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Adresse</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Téléphone </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $theaterCompleteList->fetch()) {
                    ?>
                   <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->name; ?></td>
                        <td><?php echo $result->numberOfPlace; ?></td>
                        <td><?php echo $result->address; ?></td>
                        <td><?php echo $result->phone; ?></td>
                    </tr>
                    <?php
                }
                $theaterCompleteList->closeCursor();
                ?>
            </tbody>
        </table>
    </div>