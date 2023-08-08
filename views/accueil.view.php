
<?php 
    ob_start();
?>


<?php 


$title =  "Accueil bibliothèque";
$content = ob_get_clean();
require "template.php";

?>