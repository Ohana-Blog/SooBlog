<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_inscription
 *
 * @author bbpomme
 */
class Mod_inscription extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/mini_modules/mod_inscription/controleur/Cont_inscription.php';
        $this->control = new Cont_inscription();
        
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
        }else{
           $action ="";
        }
        
        
        switch ($action) {
            case "":
                $this->control->aff_inscription();
                
                break;
            case "enr_inscription":
                $this->control->action_enr();
                
                break;

            default:
                $this->control->aff_inscription();
                break;
        }
     }

}

?>
