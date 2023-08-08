<?php 


ob_start();

    if(!empty($_SESSION['alert'])) :
 ?>
 <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <?= $_SESSION['alert']['msg'] ?>
 </div>
 <?php 
       
    endif; ?>
<!-- Star  -->

    <table class="table text-center">
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Nombre de Pages</th>
            <th colspan ="2">Actions</th>
        </tr>

        <?php   
                for($i = 0 ; $i < count($livres);$i++) :
                     ?>
        <tr>
                <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage() ?>" width="100px"></td>
         
                <td class="align-middle"><a href="<?= URL ?>livre/l/<?= $livres[$i]->getID(); ?>"><?= $livres[$i]->getTitre(); ?></a></td>

                <td class="align-middle"><?=$livres[$i]->getNbPages(); ?></td>
                <td class="align-middle"><a href="<?= URL ?>livre/m/<?= $livres[$i]->getId() ?>" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle">
                        <form action="<?= URL ?>livre/s/<?= $livres[$i]->getId() ?>" method="POST" onSubmit= "return confirm('Voulez-vous vraiment supprimer ?');"> 
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                </td>
        </tr>
        <?php endfor; ?>
    </table>
    <a href="<?= URL ?>livre/a" class="btn btn-success d-block">Ajouter Livre</a></td>






<!-- END -->

<?php 
$title =  "Les Livres de la bibliothèque";
$content = ob_get_clean();
require "template.php";
?>