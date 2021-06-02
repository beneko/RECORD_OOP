<?php
    $pageTitle='Accueil';
?>
<div class="container">
    <div class="d-flex my-3">
        <h1>Liste des disques</h1>
        <div class="ms-auto"><a href="views/add_form.php" class="btn btn-primary">Ajouter</a></div>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-4">
        <?php
        foreach($result as $disc){
        ?>
        <div class="col">
            <div class="card">
                <img src="../assets/img/<?= $disc['disc_picture'] ?>" class="card-img-top" alt="<?= $disc['disc_picture'] ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $disc['disc_title'] ?></h3>
                    <p class="card-text"><strong><?= $disc['artist_name'] ?></strong></p>
                    <p class="card-text"><strong>Label:</strong><?= $disc['disc_label'] ?></p>
                    <p class="card-text"><strong>Year:</strong><?= $disc['disc_year'] ?></p>
                    <p class="card-text"><strong>Genre:</strong><?= $disc['disc_genre'] ?></p>
                    <a href="views/details.php?disc_id=<?= $disc['disc_id'] ?>" class="btn btn-primary">Détails</a>
                </div>
            </div>
        </div>
        <?php 
        } 
        ?>
    </div>
</div>