<?php
    
    ob_start();
?>

 <div class="container-fluid">

    <form action="<?= URL ?>livre/mv" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Titre">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?= $livre->getTitre() ?>"> 
            </div>
            <div class="form-group">
                <label for="page">Nombre de pages :</label>
                <input type="number" name="nbPages" id="nbPages" class="form-control" value="<?= $livre->getId() ?>" > 
            </div>
            <div class="form-group">
                <label for="image">Image :</label>
                    <img src="<?= URL  ?>public/images/<?= $livre->getImage() ?>"> 
                <input type="file" name="image" id="image" class="form-control" value="<?= $livre->getImage() ?>"> 
            </div>
            <input type="hidden" name="id" value="<?= $livre->getId() ?>">
            <button type="submit" class="btn btn-primary">Valider</button>
    </form>
 </div>
 


<?php 
$content = ob_get_clean();
$title = "Modification du livre";

require "template.php";

?>