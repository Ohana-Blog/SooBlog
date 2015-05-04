<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author bbpomme
 */
class News {
    //put your code here
    protected $id_n;
    protected $date_n;
    protected $news;
    protected $titre_n;
    protected $photo_n;
    protected $title_n;
    protected $alt_n;
    protected $fk_id_r;
            
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

    public function getId_n() {
        return $this->id_n;
    }

    public function setId_n($id_n) {
        $this->id_n = $id_n;
    }

    public function getDate_n() {
        return $this->date_n;
    }

    public function setDate_n($date_n) {
        $this->date_n = $date_n;
    }

    public function getNews() {
        return $this->news;
    }

    public function setNews($news) {
        $this->news = $news;
    }

    public function getTitre_n() {
        return $this->titre_n;
    }

    public function setTitre_n($titre_n) {
        $this->titre_n = $titre_n;
    }
    public function getPhoto_n() {
        return $this->photo_n;
    }

    public function setPhoto_n($photo_n) {
        $this->photo_n = $photo_n;
    }
    public function getTitle_n() {
        return $this->title_n;
    }

    public function setTitle_n($title_n) {
        $this->title_n = $title_n;
    }

    public function getAlt_n() {
        return $this->alt_n;
    }

    public function setAlt_n($alt_n) {
        $this->alt_n = $alt_n;
    }

    public function getFk_id_r() {
        return $this->fk_id_r;
    }

    public function setFk_id_r($fk_id_r) {
        $this->fk_id_r = $fk_id_r;
    }






}

?>
