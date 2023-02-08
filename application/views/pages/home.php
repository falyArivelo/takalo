<!--  liste objets -->
<div class="container">

    <!-- content -->
    <div class="content">
        <!-- <a href="pages/panier.php" class="link_panier">Panier</a>
            <a href="pages/ajout.php" class="link_panier">ajout</a> -->
        <div class="buttons">
            <a class="btn" href="<?php echo base_url('Home/MesObjets'); ?> ">Mes Objets</a>
            <a class="btn" href="<?php echo base_url('Echange/propositions'); ?> ">propositions</a>

        </div>
        <h4>Tous les Objets </h4>

        <section class="shop">

            <?php
            foreach ($objets as $objet) {
            ?>
                <div class="card" data-idcard="<?php echo $objet['idObjet'] ?>">
                    <div class="image">
                        <img class="pro-image" src="<?php echo base_url('assets/images/' . $objet['photo'] . '') ?> " alt="">
                    </div>
                    <div class="info">
                        <p class="name"><?php echo $objet['titre'] ?></p>
                        <p class="price"><?php echo $objet['descri'] ?></p>
                        <p class="price"><?php echo $objet['prix'] ?> Ar</p>

                    </div>
                    <a class="icon"  href="<?php echo base_url('Echange/historique/'.$objet['idObjet'].''); ?>">H</a>
                    <a class="btn"  href="<?php echo base_url('Echange/choix/'.$objet['idObjet'].'') ?>">Echanger</a><span></span>
                </div>
            <?php } ?>

        </section>

    </div>
</div>

<!--  -->
</body>

</html>