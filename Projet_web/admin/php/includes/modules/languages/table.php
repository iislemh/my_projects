  <div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Pays</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Abréviation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $languageCompleteList->fetch()) {
                    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->name; ?></td>
                        <td><?php echo $result->abbreviation; ?></td>
                    </tr>
                    <?php
                }
                $languageCompleteList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>