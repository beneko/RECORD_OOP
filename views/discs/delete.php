<div class="container">
    <div class="row">
    <?php 
    
        ?>
            <h2 class="text-center my-5">Vous êtes sur le point de supprimer la disque "<strong><?php echo $details['disc_title']; ?></strong>" de la base de données?</h2>
            <h2 class="text-center text-danger">Êtes vous sûr de vouloir la supprimer?</h2>
            <div class="d-flex justify-content-center my-5">
                <form action="#" method="POST">
                <input type="hidden" name="disc_id" value="<?= $discId ?>">
                <input class="btn btn-danger" type="submit" value="Supprimer" name="submit">
                <a class="btn btn-primary" href="details.php?disc_id=<?= $discId ?>">Retour</a>
            </div>
        <?php
        }
    } else{
        ?>
        <h1 class="text-danger my-5" >La page que vous cherchiez n'est pas trouvée!</h1>
        <?php
    }
    ?>
    </div>
</div>
<?php
    include '../views/footer.php';
?>