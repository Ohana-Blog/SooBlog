<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mini_mod_connection
 *
 * @author bbpomme
 */
class Mini_mod_connection extends Module{
    //put your code here
  
   function __construct() {
        require_once Parametre::$MVC_BASE."/mini_modules/mini_mod_connexion/controleur/Cont_connection.php";
        $this->control = new Cont_connection();
        
         if(isset($_GET["action"]) && !empty($_GET["action"])){
      $action = $_GET["action"];   
     }else{
         $action ="";
     }
      
     switch ($action) {
         
            case "connection":
                $this->control->action_connect();
                
                break;
              case "deconnection":
                $this->control->action_deconnection();
                
                break;

            default:
                $this->control->afficher_form_connect();
                break;
        }
}

}

?>
