<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mini_mod_news
 *
 * @author bbpomme
 */
class Mini_mod_news extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_news/controleur/Cont_news.php'; 
        $this->control = new Cont_news();

     if(isset($_GET["action"]) && !empty($_GET["action"])){
      $action = $_GET["action"];   
     }else{
         $action ="";
     }
      
     switch ($action) {
            case "home":
                $this->control->afficher_module_news();
                
                break;

            default:
                 $this->control->afficher_module_news();
                break;
        }

  }

}

?>
