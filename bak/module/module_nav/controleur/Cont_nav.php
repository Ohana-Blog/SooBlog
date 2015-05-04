<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_nav
 *
 * @author bbpomme
 */
class Cont_nav extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/module/module_nav/vue/Vue_nav.php'; 
    }
    
    public function aff_nav(){
        if(isset($_SESSION["connect"]) && $_SESSION["connect"]=== TRUE){
            if($_SESSION["statut"] == "ADMIN"){
                    $this->vue = new Vue_nav();
                    $this->method_vue = "nav";
                    $this->parametre ="";
            }
        }
        
       
    }

}

?>
