<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_connection
 *
 * @author bbpomme
 */
class Cont_connection extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_connexion/model/Dao_connection.php';
        require_once Parametre::$MVC_BASE."/mini_modules/mini_mod_connexion/vue/Vue_connection.php";
        require_once Parametre::$MVC_BASE.'/entities/User.php';
        require_once Parametre::$MVC_BASE.'/helpers/Controleur.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        
    }
    
    public function afficher_form_connect(){
        if(isset($_SESSION["connect"]) && $_SESSION["connect"] === TRUE){
            $this->aff_deconnection();
        }else{
            $this->vue = new Vue_connection();
            $this->method_vue = "connection";
            $this->parametre = "";
        }
    }
    
    public function action_connect() {
        if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) && !empty($_POST["mdp"]))
            {
                $mail = $_POST["mail"];
                $mdp = $_POST["mdp"];
                
                $user = new User(array("mail"=>$_POST["mail"],"mdp"=>$_POST["mdp"]));
               
                try {
                    if($user->getMail() != NULL){
                     
                        $managuser = new Dao_connection();
                        $connect = $managuser->connexion($user);
                        $_SESSION["id"] = $connect->getId();
                        $_SESSION["connect"] = TRUE;
                        if($_SESSION["connect"] === TRUE){
                              
                             $this->aff_deconnection();
                            ?>
                                        <script>
                                            window.setTimeout(function(){
                                                window.location="index.php";
                                            },1000);
                                        </script>
                                <?php     
                        }

                    } 
                    
                    
                    
                    
                    
                } catch (Dao_connection_Exeption $e) {
                    echo $e->getMessage();
                }
              }else{
                   $this->action_deconnection();
              }
      
              
    }
    
    public function action_deconnection(){
        if(isset($_POST["deconnection"])){
            session_destroy();
            header("location:index.php");
        }
        $this->afficher_form_connect();
    }
    
    public function aff_deconnection(){
            $this->vue = new Vue_connection();
            $this->method_vue ="deconnection";
            $this->parametre=[];
    }
}

?>
