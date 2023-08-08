
<?php 
    ob_start();
?>

<?=  $msg; ?>

<?php 

$title =  "Erreur Page !!!";
$content = ob_get_clean();
require "template.php";

?>