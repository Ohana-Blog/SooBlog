<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_accueil
 *
 * @author bbpomme
 */
class Mod_accueil extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/module/module_accueil/controleur/Cont_accueil.php';
        
        $this->control = new Cont_accueil();
       if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {
           case "":
                $this->control->aff_accueil();
               break;

           default:
               $this->control->aff_accueil();
               break;
       }
    }

}

?>
