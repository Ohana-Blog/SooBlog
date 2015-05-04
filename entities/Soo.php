<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Soo
 *
 * @author bbpomme
 */
class Soo {
    //put your code here
    protected $id;
    protected $mail;
    protected $mdp;
    protected $qui;
    protected $quoi;
    protected $ou;
    protected $quand;
    protected $comment;
    protected $avatar;
    
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
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function getQui() {
        return $this->qui;
    }

    public function setQui($qui) {
        $this->qui = $qui;
    }

    public function getQuoi() {
        return $this->quoi;
    }

    public function setQuoi($quoi) {
        $this->quoi = $quoi;
    }

    public function getOu() {
        return $this->ou;
    }

    public function setOu($ou) {
        $this->ou = $ou;
    }

    public function getQuand() {
        return $this->quand;
    }

    public function setQuand($quand) {
        $this->quand = $quand;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }


}

?>
