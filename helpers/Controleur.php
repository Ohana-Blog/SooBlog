<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controleur
 *
 * @author bbpomme
 */
class Controleur {
    //put your code here
    protected $titre;
    protected $description;
    protected $keywords;
    protected $vue;
    protected $method_vue;
    protected $parametre;
    
    public function display() {
        if($this->method_vue != NULL){
            $method = $this->method_vue;
            if($this->parametre !=NULL){
                $this->vue->$method($this->parametre);
            }
            
        }
        
    }
    
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value) {
            $method = "set".$key;
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    function __construct(array $donnees) {
        if(isset ($donnees)){
            $this->hydrate($donnees);
        }
    }

        public function getTitre() {
        return $this->titre; 
    }
    public function getDescription() {
        return $this->description;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }


}

?>
