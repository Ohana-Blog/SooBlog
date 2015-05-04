<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_rubrique
 *
 * @author bbpomme
 */
class Cont_rubrique extends Controleur{
    //put your code here
 
    function __construct() {
     require_once Parametre::$MVC_BASE.'/bak/modules/mod_rubrique/vue/Vue_rubrique.php';
     require_once Parametre::$MVC_BASE.'/bak/modules/mod_rubrique/model/Dao_rubrique.php';
     require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
     require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
     require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
     require_once Parametre::$MVC_BASE.'/entities/Rubrique.php';
        
}

public function aff_gestion(){
    
    $manageRubrique = new Dao_rubrique();
    $donnees = $manageRubrique->rubriques();
    
    $this->titre ="Rubrique";
    $this->vue = new Vue_rubrique();
    $this->method_vue ="rubrique_gestion";
    $this->parametre=$donnees;
}

public function aff_modification() {
    
    $jeton = new Jeton(30);
    
    $manageJeton = new DaoJeton();
    $manageJeton->insert_jeton($jeton);
    $donnees["jeton"] = $jeton->getString();
    
    if(isset($_GET["id_r"])){
        
        $rubrique = new Rubrique(array("id_r"=>$_GET["id_r"]));
        
        if($rubrique->getId_r() !=""){
            
            $manageRubrique = new Dao_rubrique();
            $donnees["rubrique"] = $manageRubrique->rubrique_id($rubrique);

            $this->titre ="Rubrique";
            $this->vue = new Vue_rubrique();
            $this->method_vue ="rubrique_modif";
            $this->parametre=$donnees; 
  
        }

    }else{
        $this->aff_gestion();
    }

}

public function action_modif(){
    $manageJeton = new DaoJeton();

    if(isset($_POST["rubrique"])){

        
        $managejeton = new DaoJeton();
        $jeton = $managejeton->select_jeton_valid($_POST["jeton"]);
        
       if($jeton !=""){
           $rubrique = new Rubrique(array("id_r"=>$_POST["id_r"],"rubrique"=>$_POST["rubrique"]));
  
           $manageRubrique = new Dao_rubrique();
           
           $manageRubrique->rubrique_modif($rubrique);
           
           $this->aff_gestion();
       }
        
    }else{
        $this->aff_gestion();
    }

    
}

public function action_suprimer(){
    if(isset($_POST["id_r"])){   
            
            for ($i =0; $i <= count($_POST["id_r"]);$i++){
               $rubrique = new Rubrique(array("id_r"=>$_POST["id_r"][$i]));
               if($rubrique->getId_r() != ""){
                   
                   $manageRubrique = new Dao_rubrique();
                   $manageRubrique->rubrique_sup($rubrique);
               }
             
            }
            $this->aff_gestion();
        }
}

public function aff_crea(){
  
    $jeton = new Jeton(30);
    
    $manageJeton = new DaoJeton();
    $manageJeton->insert_jeton($jeton);
    $donnees["jeton"] = $jeton->getString();
    
    $this->titre ="Rubrique";
    $this->vue = new Vue_rubrique();
    $this->method_vue ="aff_creation";
    $this->parametre=$donnees; 
    
}

public function action_crea(){
    if(isset($_POST["rubrique"]) && $_POST["rubrique"] !=""){
         $manageJeton = new DaoJeton();
          
        $managejeton = new DaoJeton();
        $jeton = $managejeton->select_jeton_valid($_POST["jeton"]);
        
        if($jeton !=""){
            $rubrique = new Rubrique(array("rubrique"=>$_POST["rubrique"]));
            
            if($rubrique->getRubrique() !=""){
                $manageRubrique = new Dao_rubrique();
                $manageRubrique->rubrique_creer($rubrique);
                $this->aff_gestion();
            }
        }
    }  else {
        $this->aff_crea();
    }
}

}
?>
