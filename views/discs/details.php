<?php
$pageTitle = isset($details['disc_title']) ? $details['disc_title'] : 'disc not found!';
?>
<div class="container">
    <h1 class="my-3">Details</h1>
    <form action="#" method="post">
        <div class="row mx-2">
            <div class="col-sm-12 col-lg-4">
                <img class="img-thumbnail mb-4" src="/assets/img/<?= isset($details['disc_picture']) ? $details['disc_picture'] : ''  ?>" alt="<?= isset($details['disc_title']) ? $details['disc_title'] : '' ?>">
            </div>
            <div class="col-sm-12 col-lg-4" >
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control mb-4" value="<?= isset($details['disc_title']) ? $details['disc_title'] : '' ?>" disabled>
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" id="year" class="form-control mb-4" value="<?= isset($details['disc_year']) ? $details['disc_year'] : '' ?>"  disabled>
                <label for="label" class="form-label">Label</label>
                <input type="text" name="label" id="label" class="form-control mb-4" value="<?= isset($details['disc_label']) ? $details['disc_label'] : '' ?>"  disabled>
            </div>
            <div class="col-sm-12 col-lg-4">
                <label for="artist" class="form-label">Artist</label>
                <input type="text" name="artist" id="artist" class="form-control mb-4" value="<?=isset($details['artist_name']) ? $details['artist_name'] : '' ?>"  disabled>
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control mb-4" value="<?= isset($details['disc_genre']) ? $details['disc_genre'] : '' ?>"  disabled>
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control mb-4" value="<?= isset($details['disc_price']) ? $details['disc_price'] : '' ?>"  disabled>
            </div>
        </div>
        <div class="my-5">
            <a href="../update/<?= isset($details['disc_id']) ? $details['disc_id'] : '' ?>" class="btn btn-primary">Modifier</a>
            <a href="../delete/<?= isset($details['disc_id']) ? $details['disc_id'] : '' ?>" class="btn btn-danger">Supprimer</a>
            <a href="../index" class="btn btn-secondary">Retour</a>
        </div>
    </form>
</div>
