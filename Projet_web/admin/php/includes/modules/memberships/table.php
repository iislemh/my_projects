<div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Pseudonyme</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Type</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Newsletter</th>   
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $membershipsCompleteList->fetch()) {

                    $test = $result->membership;
                    if ($test == "Subscriber")
                        $membership = "Membre";
                    else
                        $membership = "Adhérent Ass.";
                    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->username; ?></td>
                        <td><?php echo $membership ?></td>
                        <td><?php echo $result->newsletter; ?></td>
                    </tr>
                    <?php
                }
                $membershipsCompleteList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>