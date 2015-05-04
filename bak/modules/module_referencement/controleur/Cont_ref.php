<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_ref
 *
 * @author bbpomme
 */
class Cont_ref extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/module_referencement/vue/Vue_ref.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/module_referencement/model/Dao_ref.php';
         require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
        require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
        require_once Parametre::$MVC_BASE.'/entities/Page.php';
        
        
    }
    
    
    
    public function aff_ref(){
        
        $liste = new Dao_ref();
        
        $donnees["ref"] = $liste->select_titre_article();
        
        $this->titre="Référencement";
        
        $this->vue = new Vue_ref();
        
        $this->method_vue = "form_gestion";
        
        $this->parametre = $donnees;
   
    }
    
    public function aff_form_modif() {
        
        
        
        $manageRef = new Dao_ref();
        
        if(isset($_GET["id_page"]) && is_numeric($_GET["id_page"])){
            
            $donnees["ref"] = $manageRef->select_id_article($_GET["id_page"]);
          
            if($donnees["ref"]->getId_page() != ""){
                
                $jeton = new Jeton(30);

                $manageJeton = new DaoJeton();
                $manageJeton->insert_jeton($jeton);
                $donnees["jeton"] = $jeton->getString();
           
                $this->titre="Référencement"; 
                
                $this->vue = new Vue_ref();

                $this->method_vue = "form_modif";

                $this->parametre = $donnees;
            }
            
        }else{
            $this->aff_ref();
        }
        
        
        
    }




    public function action_modif(){
        if(isset($_POST["titre_p"]) && isset($_POST["description_p"]) && isset($_POST["mot_clefs"])){
            if($_POST["titre_p"] !="" && $_POST["description_p"] !="" && $_POST["mot_clefs"] !=""){
                
                $page = new Page(array("id_page"=>$_POST["id_page"],"titre_p"=>$_POST["titre_p"],"description_p"=>$_POST["description_p"],"mot_clefs"=>$_POST["mot_clefs"]));
                
              if(isset($_POST["jeton"]) && trim($_POST["jeton"]) !=""){

                  $managejeton = new DaoJeton();
                  $jeton = $managejeton->select_jeton_valid($_POST["jeton"]);
                  if($jeton != ""){

                        $manageRef = new Dao_ref();
                        $manageRef->update($page);
                        $this->aff_ref();

                    }
                  }

               }
                
            }  else {
                $this->aff_ref();
            }
            
    }
    
      public function action_suprimer() {
        if(isset($_POST["id_page"]) && is_array($_POST["id_page"])){   
            $i="";
            for ($i =0; $i <= count($_POST["id_page"]);$i++){
               $page = new Page(array("id_page"=>$_POST["id_page"][$i]));
               if($page->getId_page() != ""){
                   
                   $managRef = new Dao_ref();
                   $managRef->ref_delete($page);
                   $this->aff_ref();
               }
             
            }
            $this->aff_ref();
        }
        $this->aff_ref();
    }
    

}

?>
