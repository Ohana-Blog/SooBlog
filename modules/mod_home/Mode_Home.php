<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author bbpomme
 */
class Mode_Home extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/modules/mod_home/controleur/Cont_home.php';
        $this->control = new Cont_home();
        
         if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];
        }else{
            $action ="";
        } 
        
        switch ($action) {
            case "home":
                $this->control->afficher_contenu();
                
                break;

            default:
                 $this->control->afficher_contenu();
                break;
        }
        
    }

    
}

?>
