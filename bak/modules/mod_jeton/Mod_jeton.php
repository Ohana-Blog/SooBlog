<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_jeton
 *
 * @author bbpomme
 */
class Mod_jeton extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_jeton/controleur/Cont_jeton.php';
        
        $this->control = new Cont_jeton();
        
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
       }else{
           $action ="";
       }
       
       switch ($action) {

           case "purge":
                $this->control->action_sup();
               break;
            

           default:
               $this->control->aff_form();
               break;
       }
        
    }

}

?>
