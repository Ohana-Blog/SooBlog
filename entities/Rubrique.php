<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubrique
 *
 * @author bbpomme
 */
class Rubrique {
    //put your code here
    
    protected $id_r;
    protected $rubrique;
            
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
           
            $method = "set".$key;
            
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    
    public function getId_r() {
        return $this->id_r;
    }

    public function setId_r($id_r) {
        $this->id_r = $id_r;
    }

    public function getRubrique() {
        return $this->rubrique;
    }

    public function setRubrique($rubrique) {
        $this->rubrique = strtoupper($rubrique);
    }


}

?>
