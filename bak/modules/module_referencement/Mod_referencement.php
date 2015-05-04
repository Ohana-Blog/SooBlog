<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_referencement
 *
 * @author bbpomme
 */
class Mod_referencement extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/module_referencement/controleur/Cont_ref.php';
        $this->control = new Cont_ref();
        
         
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {

            case "modification":
               $this->control->aff_form_modif();
               break;
            case "update":
               $this->control->action_modif();
               break;
           case "selection":
               $this->control->action_suprimer();
               break;

           default:
               $this->control->aff_ref();
               break;
       }
    }

}

?>
