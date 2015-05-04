<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_news
 *
 * @author bbpomme
 */
class Mod_news extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/module_news/controleur/Cont_news.php';
        $this->control = new Cont_news();
        
          
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {

            case "modifier":
               $this->control->aff_modifier();
               break;
           case "act_modif":
               $this->control->action_modifier();
               break;
           case "creation_form":
               $this->control->afficher_form_crea();
               break;
            case "insertion":
               $this->control->action_insert();
               break;
           case "selection":
               $this->control->action_suprimer();
               break;

           default:
               $this->control->aff_gestion_articles();
               break;
       }
    }

}

?>
