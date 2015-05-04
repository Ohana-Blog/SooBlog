<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_inscription
 *
 * @author bbpomme
 */
class Cont_inscription extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
        require_once Parametre::$MVC_BASE.'/entities/User.php';
        require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        require_once Parametre::$MVC_BASE.'/mini_modules/mod_inscription/model/Dao_inscription.php';
        require_once Parametre::$MVC_BASE.'/mini_modules/mod_inscription/vue/Vue_inscription.php';
        
    }
    
    public function aff_inscription(){
        
        $jeton = new Jeton(30);
        
        $mangeJeton = new DaoJeton();
        $mangeJeton->insert_jeton($jeton);
        
     
        
        $this->titre="inscription";
        $this->vue= new Vue_inscription();
        $this->method_vue = "form_inscription";
        $this->parametre= array("jeton"=>$jeton->getString());
     
   }
   
   
   public function action_enr(){
       if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
           if(!empty($_POST["pseudo"]) && !empty($_POST["mdp"])){
               if(strlen($_POST["mdp"]) >= 6){
                   if($_POST["mdp"] == $_POST["conf_mdp"]){
                     
                       $Managjeton = new DaoJeton();
                       $control = $Managjeton->select_jeton_valid($_POST["string"],30);
                       var_dump($control);
                       if($control !="")
                       {
                           // var_dump($control);
                            $user = new User(array("pseudo"=>htmlspecialchars($_POST["pseudo"]),"statut"=>"NOUVEAU","mail"=>$_POST["mail"],"mdp"=>htmlspecialchars($_POST["mdp"]),"url"=>$_SERVER['REMOTE_ADDR']));

                            $managInscription = new Dao_inscription();
                        
                            $user = $managInscription->insertInscription($user);
                       }

                        
                        
                   }
               }
           }
       }
       
      $this->titre="inscription";
        $this->vue= new Vue_inscription();
        $this->method_vue = "form_inscription";
        $this->parametre= [];
   }

}

?>
