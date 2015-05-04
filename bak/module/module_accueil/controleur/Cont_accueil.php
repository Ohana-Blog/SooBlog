<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_accueil
 *
 * @author bbpomme
 */
class Cont_accueil extends Controleur{
    //put your code here

    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/module/module_accueil/vue/Vue_accueil.php';
    }
    
    public function aff_accueil(){
        $this->titre ="BakOffice";
        $this->vue = new Vue_accueil();
        $this->method_vue ="acceuil";
        $this->parametre=[];
    }

   
   
}

?>
