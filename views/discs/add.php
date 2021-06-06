<?php
    $pageTitle ='Add a disc';
?>
<div class="container">
    <div class="row mx-2">
        <h1>Ajouter un vinyle</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <label for="title" class="form-label mt-3">Title</label>
                <input type="text" name="disc_title" id="title" class="form-control" value="<?= isset($_POST['disc_title']) ? $_POST['disc_title'] : '' ?>">
                <span class="error"><?= isset($formError['disc_title']) ? $formError['disc_title'] : '' ?></span>
                <label for="artist" class="form-label mt-3">Artist</label>
                <select name="artist_id" id="artist" class="form-control">
                    <option value=""></option>
                    <?php foreach($artists as $artist){
                        ?>
                    <option value="<?= $artist->artist_id ?>" <?= (isset($_POST['artist_id']) && $_POST['artist_id'] === $artist->artist_id) ? 'selected' : '' ?>><?= $artist->artist_name ?></option>
                    <?php 
                    } 
                    ?>
                </select>
                <span class="error"><?= isset($formError['artist_id']) ? $formError['artist_id'] : '' ?></span>
                <label for="year" class="form-label mt-3">Year</label>
                <input type="text" name="disc_year" id="year" class="form-control" value="<?= isset($_POST['disc_year']) ? $_POST['disc_year'] : '' ?>">
                <span class="error"><?= isset($formError['disc_year']) ? $formError['disc_year'] : '' ?></span>
                <label for="label" class="form-label mt-3">Label</label>
                <input type="text" name="disc_label" id="label" class="form-control" value="<?= isset($_POST['disc_label']) ? $_POST['disc_label'] : '' ?>">
                <span class="error"><?= isset($formError['disc_label']) ? $formError['disc_label'] : '' ?></span>
                <label for="genre" class="form-label mt-3">Genre</label>
                <input type="text" name="disc_genre" id="genre" class="form-control" value="<?= isset($_POST['disc_genre']) ? $_POST['disc_genre'] : '' ?>">
                <span class="error"><?= isset($formError['disc_genre']) ? $formError['disc_genre'] : '' ?></span>
                <label for="price" class="form-label mt-3">Price</label>
                <input type="text" name="disc_price" id="price" class="form-control" value="<?= isset($_POST['disc_price']) ? $_POST['disc_price'] : '' ?>">
                <span class="error"><?= isset($formError['disc_price']) ? $formError['disc_price'] : '' ?></span>
                <label for="price" class="form-label mt-3">Picture</label>
                <input type="file" class="form-control" id="picture" name="disc_picture">
                <span class="error"><?= isset($fileError['disc_picture']) ? $fileError['disc_picture'] : '' ?></span>
                <div class="my-5">
                <input type="submit" class="btn btn-primary" value="Ajouter" name="submit">
                <a href="../" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </form>
    </div>
</div>
