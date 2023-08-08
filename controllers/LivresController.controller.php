<?php 

       require_once "LivreManager.class.php";
        require_once "LivreManager.php";
        
    class LivresController{

        private $livreManager;

        
            // require "../Livre.class.php";
            // require_once "../LivreManager.php";
        
         public function __construct(){

            $this->livreManager = new LivreManager;
            $this->livreManager->chargementLivres();

        }

        public function afficherLivres(){
            
            $livres = $this->livreManager->getLivres(); //recuperation de tous les livres 
            require "views/livre.view.php";
        }

        public function afficherUnLivre($id){
            
            $livre = $this->livreManager->getLivreById($id);
            require "views/afficherUnLivre.php";
            
            // echo $livre->getTitre();
        }

        public function ajoutLivre(){
            require "views/ajoutLivre.php";
        }

        public function ajoutLivreValidation(){
            $file = $_FILES['image'];
            $repertoir =  "public/images/";
            $nomImageAjoute = $this->ajoutImage($file,$repertoir);
            $this->livreManager->ajoutLivreBd($_POST['titre'],$_POST['nbPages'],$nomImageAjoute);
            header('Location: '. URL . "livre");
        
        }

        private function ajoutImage($file, $dir){
            if(!isset($file['name']) || empty($file['name']))
                throw new Exception("Vous devez indiquer une image");
        
            if(!file_exists($dir)) mkdir($dir,0777);
        
            $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            $random = rand(0,99999);
            $target_file = $dir.$random."_".$file['name'];
            
            if(!getimagesize($file["tmp_name"]))
                throw new Exception("Le fichier n'est pas une image");
            if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
                throw new Exception("L'extension du fichier n'est pas reconnu");
            if(file_exists($target_file))
                throw new Exception("Le fichier existe déjà");
            if($file['size'] > 500000)
                throw new Exception("Le fichier est trop gros");
            if(!move_uploaded_file($file['tmp_name'], $target_file)) 
                throw new Exception("l'ajout de l'image n'a pas fonctionné");
            else return ($random."_".$file['name']);
        }


        public function suppressionLivre($id){
            $livre = $this->livreManager->getLivreById($id);
            $nomImage = $livre->getImage();
            $cheminImage = "public/images/".$nomImage;
                if (file_exists($cheminImage)) {
                    unlink($cheminImage);
                }
            $this->livreManager->suppressionLivreBd($id);
            header('Location: '. URL . "livre");
        }







    }






?>