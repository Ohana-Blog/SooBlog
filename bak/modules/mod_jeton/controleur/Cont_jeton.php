<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_jeton
 *
 * @author bbpomme
 */
class Cont_jeton extends Controleur{
    //put your code here
    function __construct() {
        //require_once Parametre::$MVC_BASE.'/bak/modules/mod_jeton/model/Dao_jeton.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_jeton/vue/Vue_jeton.php';
        require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
        require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
    }

    public function aff_form() {
        $manageJeton = new DaoJeton();
        $donnees["jeton"] = $manageJeton->select_jetons();
        
        $this->titre ="Jetons";
        $this->vue = new Vue_jeton();
        $this->method_vue ="forms";
        $this->parametre = $donnees;
    }
    
    public function action_sup(){
        if(isset($_POST["effacer"])){
            $managJeton = new DaoJeton;
            $managJeton->delete_jeton(30);
            $this->aff_form();
        }
    }
}

?>
