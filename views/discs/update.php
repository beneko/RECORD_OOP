<?php
    $pageTitle = isset($details['disc_title']) ? 'Update ' . $details['disc_title'] : 'disc not found!';
?>
<div class="container">
    <div class="row mx-2">

            <h1 class="my-3">Modifier un vinyle</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="disc_id" class="form-control" value="<?= isset($details['disc_id']) ? $details['disc_id'] : '' ?>">
                    <label for="title" class="form-label mt-3">Title</label>
                    <input type="text" name="disc_title" id="title" class="form-control" value="<?= isset($details['disc_title']) ? $details['disc_title'] : '' ?>">
                    <span class="error"><?= isset($formError['disc_title']) ? $formError['disc_title'] : '' ?></span>
                    <label for="artist" class="form-label mt-3">Artist</label>
                    <select name="artist_id" id="artist" class="form-control">
                        <option value=""></option>
                        <?php foreach($artists as $artist){
                            ?>
                        <option value="<?= $artist->artist_id ?>" <?= (isset($details['artist_name']) && $details['artist_name'] === $artist->artist_name) ? 'selected' : '' ?> ><?= $artist->artist_name ?></option>
                        <?php 
                        } 
                        ?>
                    </select>
                    <span class="error"><?= isset($formError['artist_id']) ? $formError['artist_id'] : '' ?></span>
                    <label for="year" class="form-label mt-3">Year</label>
                    <input type="text" name="disc_year" id="year" class="form-control" value="<?= isset($details['disc_year']) ? $details['disc_year'] : '' ?>">
                    <span class="error"><?= isset($formError['disc_year']) ? $formError['disc_year'] : '' ?></span>
                    <label for="label" class="form-label mt-3">Label</label>
                    <input type="text" name="disc_label" id="label" class="form-control" value="<?= isset($details['disc_label']) ? $details['disc_label'] : '' ?>">
                    <span class="error"><?= isset($formError['disc_label']) ? $formError['disc_label'] : '' ?></span>
                    <label for="genre" class="form-label mt-3">Genre</label>
                    <input type="text" name="disc_genre" id="genre" class="form-control" value="<?= isset($details['disc_genre']) ? $details['disc_genre'] : '' ?>">
                    <span class="error"><?= isset($formError['disc_genre']) ? $formError['disc_genre'] : '' ?></span>
                    <label for="price" class="form-label mt-3">Price</label>
                    <input type="text" name="disc_price" id="price" class="form-control" value="<?= isset($details['disc_price']) ? $details['disc_price'] : '' ?>">
                    <span class="error"><?= isset($formError['disc_price']) ? $formError['disc_price'] : '' ?></span>
                    <label for="price" class="form-label mt-3">Picture</label>
                    <input type="file" class="form-control" id="picture" name="disc_picture">
                    <span class="error"><?= isset($fileError['disc_picture']) ? $fileError['disc_picture'] : '' ?></span>
                    <input type="hidden" name="disc_picture" value="<?= isset($details['disc_picture']) ? $details['disc_picture'] : '' ?>">
                    <div class="col-sm-12 col-lg-4 mt-3">
                        <img src="/assets/img/<?= isset($details['disc_picture']) ? $details['disc_picture'] : '' ?>" class="img-thumbnail" alt="<?= isset($details['disc_picture']) ? $details['disc_picture'] : ''   ?>">
                    </div>
                    <div class="my-5">
                    <input type="submit" class="btn btn-primary" value="Modifier" name="submit">
                    <a href="../details/<?= isset($details['disc_id']) ? $details['disc_id'] : '' ?>" class="btn btn-secondary">Retour</a>
                </div>
            </form>
    </div>
</div>