<?php

class LivresManager{ // Attention au noms des classes il peut avoir des colision si le meme nom se repete.
    private $livres;

    public function ajoutLivre($livre){
        $this->livres[] = $livre;
    }

    public function getLivres(){
        return $this->livres;
    }
    
}