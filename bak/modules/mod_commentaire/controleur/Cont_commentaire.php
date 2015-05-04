<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_commentaire
 *
 * @author bbpomme
 */
class Cont_commentaire extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_commentaire/vue/Vue_commentaire.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_commentaire/model/Dao_commentaire.php';
        require_once Parametre::$MVC_BASE.'/entities/Commentaire.php';
        require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
        

    }
    
         public function aff_forms(){
             $manageCom = new Dao_commentaire();
             $donnees = $manageCom->select_coms();
             var_dump($donnees);
             $this->titre ="Commentaires";
             $this->vue = new Vue_commentaire();
             $this->method_vue ="forms";
             $this->parametre=array("donnees"=>$donnees);
        }
        
        public function action_modif(){
            if(isset($_POST["modifier"])){
                if(isset($_POST["id_com"]) && is_numeric($_POST["id_com"])){
                    if(isset($_POST["afficher"]) && trim($_POST["afficher"]) !=""){
                        $donnees = new Commentaire(array("id_com"=>$_POST["id_com"],"afficher"=>$_POST["afficher"]));
                        if($donnees->getAfficher() !=""){
                            $managCom = new Dao_commentaire();
                            var_dump($donnees);
                            $managCom->afficher_com($donnees);
                            $this->aff_forms();
                        }
                    }
                    if(isset($_POST["afficher"]) && trim($_POST["afficher"]) =="effacer"){
                        $this->action_sup();
                    }
                }
            }
        }
        
        public function action_sup(){
            if(isset($_POST["modifier"])){
                if(isset($_POST["id_com"]) && is_numeric($_POST["id_com"])){
                    if(isset($_POST["afficher"]) && trim($_POST["afficher"]) =="effacer"){
                        $donnees = new Commentaire(array("id_com"=>$_POST["id_com"],"afficher"=>$_POST["afficher"]));
                        if($donnees->getAfficher() !=""){
                            $managCom = new Dao_commentaire();
                            
                            $managCom->suprimer_com($donnees);
                            $this->aff_forms();
                        }
                    }
                }
            }
        }

}

?>
