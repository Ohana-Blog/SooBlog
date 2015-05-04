<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_connection
 *
 * @author bbpomme
 */
class Mod_connection extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/controleur/Cont_connect.php';
        $this->control = new Cont_connect();
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
               $this->control->aff_form();
               break;
       }
    }

}

?>
