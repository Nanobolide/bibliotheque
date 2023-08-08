
<?php
    
    ob_start();
?>
 
 <div class="col-6">
    <p> <b>Titre </b> : <?= $livre->getTitre() ?></p>
    <p> <img src="<?= URL ?>public/images/<?= $livre->getImage() ?>" ></p>
    <p>Nombre de pages : <?= $livre->getNbPages(); ?></p>

 </div>


<?php 
$content = ob_get_clean();
$title = $livre->getTitre();

require "template.php";

?>