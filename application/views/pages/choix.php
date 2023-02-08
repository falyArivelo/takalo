<form action="<?php echo base_url('Echange/sendExchangeRequest'); ?>" method="post">
    <div>
        <?php
        foreach ($objets as $objet) {
        ?>
            <div><?php echo $objet['titre']  ?><input type="checkbox" name="idObjets1[]" value="<?php echo $objet['idObjet'] ?>"></div>
        <?php } ?>

    </div>
    <!-- <input type="hidden" name="idMembre1" value="2"> id an tena  -->
    <!-- <input type="hidden" name="idMembre2" value="1"> idAnle tompony  -->
    <input type="hidden" name="idObjet2" value="<?php echo $idObjet2 ?>"> <!-- idAnle object irina ho azo  -->

    <input type="submit" value="Go">
</form>