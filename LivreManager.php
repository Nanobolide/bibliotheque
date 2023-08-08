<?php 
require_once "Model.class.php";
require_once "Livre.class.php";

    class LivreManager extends Model{

     private $livres;

        public function ajoutLivre($livre){
                $this->livres[] = $livre;
            }

        public function getLivres(){
                return $this->livres;
            }


        public function chargementLivres(){
                    $req= $this->getBdd()->prepare("SELECT * FROM biblio");
                    $req->execute();
                    $livres = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                


                foreach ($livres as $livre){
                    $l = new Livre($livre['id'],$livre['titre'],$livre['nbPages'],$livre['image']);

                    $this->ajoutLivre($l); 
                }
            }

    public function getLivreById($id){
            for($i= 0; $i< count($this->livres); $i++){

                if($this->livres[$i]->getId()  == $id){
                    return $this->livres[$i];

            }
        }
     return null; 
  }



    public function ajoutLivreBd($titre,$nbPages,$image){
        //Il est important de de bien mettre le de nom de la table .
        $req = "
        INSERT INTO biblio (titre,nbPages,image)  
         values (:titre,:nbPages, :image)";
         $stmt = $this->getBdd()->prepare($req);
         $stmt->bindValue(":titre",$titre, PDO::PARAM_STR);
         $stmt->bindValue(":nbPages",$nbPages, PDO::PARAM_INT);
         $stmt->bindValue(":image",$image, PDO::PARAM_STR);
         $resultat = $stmt->execute();
         $stmt->closeCursor();

         
         if ($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(),$titre,$nbPages,$image);
            $this->ajoutLivre($livre);
         }
    }

    public function suppressionLivreBd($id){
        $req = "
            DELETE FROM biblio where id = :idLivre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre",$id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $livre= $this->getLivreById($id);
                    unset($livre);
            
        } 
    }
}




?>