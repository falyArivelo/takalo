<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?> ">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-free-6.1.2-web/css/all.css') ?> ">
    <title>home</title>
</head>
<body>
    
<h5><?php echo $_SESSION['connected']['email'] ?> </h5>

<!--  liste objets -->

<div class="container">
        <!-- content -->
        <div class="content">
            <!-- <a href="pages/panier.php" class="link_panier">Panier</a>
            <a href="pages/ajout.php" class="link_panier">ajout</a> -->

            <section class="shop">
                <?php
                foreach ($objets as $objet) {
                ?>
                    <div class="card" data-idcard="<?php echo $objet['idObjet'] ?>">
                        <div class="image">
                            <img class="pro-image" src="<?php echo base_url('assets/images/'.$objet['photo'].'') ?> " alt="">
                        </div>
                        <div class="info">
                            <p class="name"><?php echo $objet['titre'] ?></p>
                            <p class="price"><?php echo $objet['descri'] ?></p>
                            <a ><i class="fas fa-shopping-bag add"></i></a>
                            <a><i class="fas fa-edit edit"></i></a>

                        </div>
                    </div>
                <?php } ?>

            </section>
        </div>
    </div>
<!--  -->
</body>
</html>