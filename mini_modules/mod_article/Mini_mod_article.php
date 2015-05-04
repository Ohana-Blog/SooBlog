<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mini_mod_article
 *
 * @author bbpomme
 */
class Mini_mod_article extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/mini_modules/mod_article/controleur/Cont_article.php';
        
        $this->control = new Cont_article();
        
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
        }else{
         $action ="";
        }
      
        switch ($action) {
            case "home":
                $this->control->afficher_mini_mod_article();
                
                break;

            default:
                 $this->control->afficher_mini_mod_article();
                break;
        }
    }

}

?>
