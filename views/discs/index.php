<table class="table table-dark">
    <thead>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Année</th>
        <th>Label</th>
        <th>Genre</th>
        <th>Prix</th>
        <th>ID Artiste</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($discs as $disc) {
        ?>
        <tr>
            <td><?= $disc->disc_id ?></td>
            <td><?= $disc->disc_title ?></td>
            <td><?= $disc->disc_year ?></td>
            <td><?= $disc->disc_label ?></td>
            <td><?= $disc->disc_genre ?></td>
            <td><?= $disc->disc_price ?></td>
            <td><?= $disc->artist_id ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>