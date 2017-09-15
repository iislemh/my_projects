  <div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nom</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Prénom</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Poste</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $employeesCompleteList->fetch()) {
                    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->firstname; ?></td>
                        <td><?php echo $result->lastname; ?></td>
                        <td><?php echo $result->job; ?></td>
                        <td><?php echo $result->status; ?></td>
                    </tr>
                    <?php
                }
                $employeesCompleteList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>
