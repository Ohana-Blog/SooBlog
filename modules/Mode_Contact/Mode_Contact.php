<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mode_Contact
 *
 * @author bbpomme
 */
class Mode_Contact extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE. '/modules/Mode_Contact/controleur/Cont_Contact.php';
        $this->control = new Cont_Contact();
        
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];
        }else{
            $action ="";
        } 
        
        switch ($action) {
            case "form":

                $this->control->affichage();
                break;

            default:
                $this->control->affichage();
                break;
        }
    }

}

?>
