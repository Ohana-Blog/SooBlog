<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author bbpomme
 */
class User {
    //put your code here
    protected $id;
    protected $pseudo;
    protected $statut;
    protected $mail;
    protected $mdp;
    protected $date;
    protected $url;
    
    function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = "set".$key;
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
        if($pseudo != "" AND strlen($pseudo) >= 3)
        $this->pseudo = $pseudo;
    }
    
    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    
    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        $this->mail = $mail;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        if(strlen($mdp) >= 6)
        $this->mdp = $mdp;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }



}

?>
