<div id="table">
        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Genre</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nombres de films</th>

                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = $genresCompleteLists->fetch()) {
                    ?>
                    <tr>
                        <td class="title"><?php echo $result->genre; ?></td>
                        <td><?php echo $result->moviesCount; ?></td>
                    </tr>
    <?php
}
$genresCompleteLists->closeCursor();
?>

            </tbody>
        </table>



        <table class="tablesaw">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Genre</th>
                </tr>
            </thead>
            <tbody>
<?php
while ($result = $genresList->fetch()) {
    ?>
                    <tr data-id="<?php echo $result->id; ?>">
                        <td class="title"><?php echo $result->name; ?></td>
                    </tr>
                    <?php
                }
                $genresList->closeCursor();
                ?>

            </tbody>
        </table>
    </div>