<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_nav
 *
 * @author bbpomme
 */
class Mod_nav extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/module/module_nav/controleur/Cont_nav.php'; 
        
        $this->control = new Cont_nav();
        
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {

           case "gestion":
                $this->control->aff_nav();
               break;

           default:
               $this->control->aff_nav();
               break;
       }
    }

}

?>
