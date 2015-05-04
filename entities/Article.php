<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author bbpomme
 */
class Article {
    //put your code here
    protected $id_article;
    protected $titre_a;
    protected $article;
    protected $resume_a;
    protected $date_a;
    protected $photo_a;
    protected $title;
    protected $alt;
    
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = "set".$key;
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    public function getId_article() {
        return $this->id_article;
    }

    public function setId_article($id_article) {
        $this->id_article = htmlspecialchars($id_article);
    }

    public function getTitre_a() {
        return $this->titre_a;
    }

    public function setTitre_a($titre_a) {
        $this->titre_a = $titre_a;
    }

    public function getArticle() {
        return $this->article;
    }

    public function setArticle($article) {
        $this->article = $article;
    }

    public function getResume_a() {
        return $this->resume_a;
    }

    public function setResume_a() {
        $this->resume_a = substr($this->article, 0, 100);
    }

    public function getDate_a() {
        return $this->date_a;
    }

    public function setDate_a($date_a) {
        $this->date_a = $date_a;
    }

    public function getPhoto_a() {
        return $this->photo_a;
    }

    public function setPhoto_a($photo_a) {
        $this->photo_a = $photo_a;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAlt() {
        return $this->alt;
    }

    public function setAlt($alt) {
        $this->alt = $alt;
    }


    
}

?>
