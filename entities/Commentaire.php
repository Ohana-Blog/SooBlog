<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commentaire
 *
 * @author bbpomme
 */
class Commentaire {
    //put your code here
    protected $id_com;
    protected $date_com;
    protected $commentaire;
    protected $pseudo;
    protected $fk_id_art;
    protected $fk_id_user;
    protected $afficher;
    protected $ip;
            
    function __construct(array $donnees) {
        $this->hydrate($donnees); 
    }

    
    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value) {
            $method ="set".$key;
            if(method_exists($this, $method)){
                if(method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }
    }
    
    public function getId_com() {
        return $this->id_com;
    }

    public function setId_com($id_com) {
        $this->id_com = $id_com;
    }

    public function getDate_com() {
        return $this->date_com;
    }

    public function setDate_com($date_com) {
        $this->date_com = $date_com;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function getFk_id_art() {
        return $this->fk_id_art;
    }

    public function setFk_id_art($fk_id_art) {
        $this->fk_id_art = $fk_id_art;
    }

    public function getFk_id_user() {
        return $this->fk_id_user;
    }

    public function setFk_id_user($fk_id_user) {
        $this->fk_id_user = $fk_id_user;
    }
    public function getAfficher() {
        return $this->afficher;
    }

    public function setAfficher($afficher) {
        $this->afficher = $afficher;
    }

        public function getIp() {
        return $this->ip;
    }

    public function setIp($ip) {
        $this->ip = $ip;
    }



}

?>
