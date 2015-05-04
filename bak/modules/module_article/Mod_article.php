<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_article
 *
 * @author bbpomme
 */
class Mod_article extends Module{
    //put your code here
    public function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/module_article/controleur/Cont_article.php';
        $this->control = new Cont_article();
        
        
       if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {

           case "gestion":
                $this->control->aff_forms();
               break;
           case "select":
                $this->control->action_selection();
               break;
           case "insert":
                $this->control->action_insert();
               break;
           case "modif":
                $this->control->action_update();
               break;
           case "supression":
                $this->control->action_delete();
               break;

           default:
               $this->control->aff_forms();
               break;
       }
    }

}

?>
