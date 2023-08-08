<?php 
//Les  routes

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
        "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/LivresController.controller.php";

 $livreController = new LivresController;
   
 try {
  
    if(empty($_GET['page'])){
        require "views/accueil.view.php";
    } else{

        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
         

        switch($url[0]){
            case "accueil" : require "views/accueil.view.php";
                break;
            case "livre" :
                if (empty($url[1])) {
                        $livreController->afficherLivres();
                }else if($url[1] === "l"){
                     echo  $livreController->afficherUnLivre($url[2]);
                }
                else if($url[1] === "a"){
                    echo $livreController->ajoutLivre();
                }
                else if($url[1] === "m"){
                    echo "Modifierun Livre";
                }
                else if($url[1] === "s"){
                    echo $livreController->suppressionLivre($url[2]);
                }else if($url[1]=== "av"){
                        $livreController->ajoutLivreValidation();
                }else{
                    throw new Exception("La page n'existe pas");
                }
            break;
                default :  throw new Exception("La page n'existe pas");
        }
    }

    
    
      //code...
 } catch(Exception $e){
        echo $e->getMessage();
    }

?> 