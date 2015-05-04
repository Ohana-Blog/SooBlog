<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author bbpomme
 */
class Page {
    //put your code here
    protected $id_page;
    protected $titre_p;
    protected $description;
    protected $mot_clefs;
    protected $fk_id_article;
    protected $nom_table;
            
    
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
    
    public function getId_page() {
        return $this->id_page;
    }

    public function setId_page($id_page) {
        $this->id_page = $id_page;
    }

    public function getTitre_p() {
        return $this->titre_p;
    }

    public function setTitre_p($titre_p) {
        $this->titre_p = $titre_p;
    }

    public function getDescription_p() {
        return $this->description;
    }

    public function setDescription_p($description) {
        $this->description = $description;
    }

    public function getMot_clefs() {
        return $this->mot_clefs;
    }

    public function setMot_clefs($mot_clefs) {
        $this->mot_clefs = $mot_clefs;
    }

    public function getFk_id_article() {
        return $this->fk_id_article;
    }

    public function setFk_id_article($fk_id_article) {
        $this->fk_id_article = $fk_id_article;
    }
    public function getNom_table() {
        return $this->table;
    }

    public function setNom_table($table) {
        $this->table = $table;
    }






}

?>
