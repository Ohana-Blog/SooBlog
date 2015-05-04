<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_Contact
 *
 * @author bbpomme
 */
class Cont_Contact extends Controleur {
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/modules/Mode_Contact/vue/Vue_contact.php';
    }
    
    public function affichage(){
        $this->vue = new Vue_contact();
        $this->method_vue = "test";
        //$this->parametre ="";
    }

}

?>
