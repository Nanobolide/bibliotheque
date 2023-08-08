<?php
    
    ob_start();
?>

 <div class="container-fluid">

    <form action="<?= URL ?>livre/av" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Titre">Titre :</label>
                <input type="text" name="titre" id="titre" class="form-control"> 
            </div>
            <div class="form-group">
                <label for="page">Nombre de pages :</label>
                <input type="number" name="nbPages" id="nbPages" class="form-control"> 
            </div>
            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" name="image" id="image" class="form-control"> 
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
    </form>
 </div>
 


<?php 
$content = ob_get_clean();
$title = "Ajout D'un livre";

require "template.php";

?>