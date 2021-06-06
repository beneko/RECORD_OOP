<?php
    $pageTitle = isset($details['disc_title']) ? 'delete ' . $details['disc_title'] : 'disc not found!';
?>
<div class="container">
    <div class="row">
        <h2 class="text-center my-5">Vous êtes sur le point de supprimer la disque <strong class="text-danger">"<?= isset($details['disc_title']) ? $details['disc_title'] : '' ?>"</strong></h2>
        <h2 class="text-center text-danger">Êtes vous sûr de vouloir la supprimer?</h2>
        <div class="d-flex justify-content-center my-5">
            <form action="" method="post">
            <input class="btn btn-danger" type="submit" value="Supprimer" name="submit">
            <a class="btn btn-primary" href="../">Retour</a>
        </div>
    </div>
</div>