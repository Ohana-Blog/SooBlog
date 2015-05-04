<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_commentaire
 *
 * @author bbpomme
 */
class Mod_commentaire extends Module{
    //put your code here
    function __construct() {
       require_once Parametre::$MVC_BASE.'/bak/modules/mod_commentaire/controleur/Cont_commentaire.php';  
       
       $this->control = new Cont_commentaire();
       
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {

           case "modifier":
                $this->control->action_modif();
               break;
            

           default:
               $this->control->aff_forms();
               break;
       }
    }

    
}

?>
