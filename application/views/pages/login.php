<div class="error">
    <?php if($this->session->flashdata('error')) { ?>
        <p><?php  echo $this->session->flashdata('error') ?></p>
   <?php } ?>   
</div>
<form action="Authentification/secure" method="post">
    <label> user:<input type="email" name="email"></label>
    <label> Password:<input type="password" name="password"></label>
    <input type="submit" value="se connecter">
</form>

<a href="<?php echo base_url('Authentification/inscription') ?>">inscription</a>


