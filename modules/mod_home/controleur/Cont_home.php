<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_home
 *
 * @author bbpomme
 */
class Cont_home extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/modules/mod_home/vue/Vue_home.php';
        require_once Parametre::$MVC_BASE.'/modules/mod_home/model/Dao_home.php';
        require_once Parametre::$MVC_BASE.'/helpers/Controleur.php';
        require_once Parametre::$MVC_BASE.'/entities/Soo.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
    }
    
    
    public function afficher_contenu(){
        
        $donnees = new Dao_Home();
        
        
        try {
            $home = $donnees->selectHome();
            
            $this->vue = new Vue_home();
            $this->method_vue ="contenu";
            $this->parametre = (array("qui"=>$home->getQui(),"quoi"=>$home->getQuoi(),"ou"=>$home->getOu(),"quand"=>$home->getQuand(),"comment"=>$home->getComment()));
            $this->titre = "Home";
            
        } catch (Dao_home_Exception $e) {
            $this->vue = new Vue_home();
            $this->method_vue="error_message";
            $this->parametre = $e->getMessage();
        }







//        $this->vue = new Vue_home();
//        $this->method_vue ="contenu";
//        $this->parametre ="";
        
    }

}

?>
