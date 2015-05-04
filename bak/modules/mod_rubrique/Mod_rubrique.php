<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_rubrique
 *
 * @author bbpomme
 */
class Mod_rubrique extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_rubrique/controleur/Cont_rubrique.php'; 
        
        $this->control = new Cont_rubrique();
          
          if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {
           
            case "creation":
                $this->control->action_crea();
            break;

            case "creation_form":
                $this->control->aff_crea();
               break;
           case "suprimer":
               $this->control->action_suprimer();
               break;
              case "modifier":
                  $this->control->action_modif();
               break;
           
              case "modification":
               $this->control->aff_modification();
                break;

           

           default:
               $this->control->aff_gestion();
               break;
       }
    }

}

?>
