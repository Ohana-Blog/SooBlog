<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_connect
 *
 * @author bbpomme
 */
class Cont_connect extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/vue/Vue_connection.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/model/Dao_connection.php';
        require_once Parametre::$MVC_BASE.'/entities/User.php'; 
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php'; 
    }
    
    public function aff_form(){
        if(isset($_SESSION["connect"]) && $_SESSION["connect"] === TRUE){
            $this->aff_deconnection();
            return;
        }else{

            $this->vue = new Vue_connection();
            $this->method_vue ="connect";
            $this->parametre =[];
        }
    }
    
    public function action_connect() {
        
      if((isset($_POST["mail"]) && $_POST["mail"] !="") && (isset($_POST["mdp"]) && $_POST["mdp"] !="")) {
          if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) && !empty($_POST["mdp"]))
            {
                $mail = $_POST["mail"];
                $mdp = $_POST["mdp"];
                
                $user = new User(array("mail"=>$_POST["mail"],"mdp"=>$_POST["mdp"]));
               
                try {
                    if($user->getMail() != NULL){
                     
                        $managuser = new Dao_connection();
                        $connect = $managuser->connexion($user);
                        // Verifier connection renvoi donné ou null
                        $_SESSION["id"] = $connect->getId();
                        $_SESSION["statut"] = $connect->getStatut();
                        $_SESSION["connect"] = TRUE;

                        if($_SESSION["connect"] === TRUE){
                               ?>
                                        <script>
                                            window.setTimeout(function(){
                                                window.location="index.php";
                                            },5000);
                                        </script>
                                <?php
                        }

                    } 
                    
                    
                    
                    
                    
                } catch (Dao_connection_Exeption $e) {
                    echo $e->getMessage();
                }
              }
        $this->aff_form();
      }else
      {
//        ?>
                <script>
                    window.setTimeout(function(){
                        window.location="index.php";
                    },10);
                </script>
            <?php
      }        
    }
    
    public function action_deconnection(){
        if(isset($_POST["deconnection"])){
            unset($_SESSION);
            session_destroy();
             ?>
                <script>
                    window.setTimeout(function(){
                        window.location="index.php";
                    },20000);
                </script>
            <?php
        }
        $this->aff_form();
    }
    
    public function aff_deconnection(){
            $this->vue = new Vue_connection();
            $this->method_vue ="deconnection";
            $this->parametre=[];
    }
}

?>
