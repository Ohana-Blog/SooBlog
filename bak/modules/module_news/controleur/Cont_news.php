<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_news
 *
 * @author bbpomme
 */
class Cont_news extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/module_news/vue/Vue_news.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/module_news/model/Dao_news.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/module_news/model/Dao_rubrique.php';
        require_once Parametre::$MVC_BASE.'/entities/News.php';
        require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
        require_once Parametre::$MVC_BASE.'/entities/Rubrique.php';
        require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
    }

    public function aff_gestion_articles(){
            $managNews = new Dao_news();
            $donnees = $managNews->news(); 

            
            
        $this->titre = "News";
        $this->vue = new Vue_news();
        $this->method_vue ="aff_getion_articles";
        $this->parametre =array("news"=>$donnees["news"],"rubrique"=>$donnees["rubrique"]);
    }

    public function aff_modifier() {
        $manageNews = new Dao_news();
        if(isset($_GET["id_n"])) $donnees["news"] = $manageNews->news_id($_GET["id_n"]);
        if(isset($_POST["id_n"])) $donnees["news"] = $manageNews->news_id($_POST["id_n"]);
        
        $jeton = new Jeton(30);

        $manageJeton = new DaoJeton();
        $manageJeton->insert_jeton($jeton);
        $donnees["jeton"] = $jeton->getString();
        
        $manageRubrique = new Dao_rubrique();
        $donnees["rubrique"] = $manageRubrique->select_rubriques();
         

        $this->titre="News";
        $this->vue = new Vue_News();
        $this->method_vue = "modifier_article";
        $this->parametre = $donnees;
        
    }
    
    public function action_modifier(){
        

         
        if(isset($_POST["titre_n"]) && isset($_POST["news"])){
           
                if(trim($_POST["titre_n"]) !="" && trim($_POST["news"]) !="" && trim($_POST["title_n"]) !="" && trim($_POST["alt_n"]) !=""){
                    
                    $news = new News(array("id_n"=>$_POST["id_n"],"titre_n"=>$_POST["titre_n"],"news"=>$_POST["news"],"photo_n"=>$_FILES["photo_n"]["name"],"title_n"=>$_POST["title_n"],"alt_n"=>$_POST["alt_n"],"fk_id_r"=>$_POST["fk_id_r"]));
                    if($news->getTitre_n() !=""){
                        
                       if(isset($_POST["jeton"]) && trim($_POST["jeton"]) !=""){
                          
                          $managejeton = new DaoJeton();
                          $jeton = $managejeton->select_jeton_valid($_POST["jeton"]);
                          if($jeton != ""){
                              
                              if((uploadedImg($_FILES["photo_n"],"/img/")) === TRUE){
                                 
                               $managNews = new Dao_news();
                                $managNews->modifier_news($news);
                                $this->aff_modifier();
                              
                            }
                          }
                          
                       }   
                        
                    }
                }
                
            }
            
            $this->aff_modifier();
            
        
    }
    
    public function afficher_form_crea() {
        
        $jeton = new Jeton(30);

        $manageJeton = new DaoJeton();
        $manageJeton->insert_jeton($jeton);
        $donnees["jeton"] = $jeton->getString();
        
        $manageRubrique = new Dao_rubrique();
        $donnees["rubrique"] = $manageRubrique->select_rubriques();
        
        $this->titre ="News";
        $this->vue = new Vue_News();
        $this->method_vue ="ajout_article";
        $this->parametre = $donnees;
    }
    
    
   public function action_insert() {
    
            if(isset($_POST["titre_n"]) && isset($_POST["news"])){

                if(trim($_POST["titre_n"]) !="" && trim($_POST["news"]) !="" && trim($_POST["title_n"]) !="" && trim($_POST["alt_n"]) !=""){
                    $news = new News(array("titre_n"=>$_POST["titre_n"],"news"=>$_POST["news"],"photo_n"=>$_FILES["photo_n"]["name"],"title_n"=>$_POST["title_n"],"alt_n"=>$_POST["alt_n"],"fk_id_r"=>$_POST["fk_id_r"]));
                   
                    if($news->getTitre_n() !=""){

                         if(isset($_POST["jeton"]) && trim($_POST["jeton"]) !=""){

                          $managejeton = new DaoJeton();
                          $jeton = $managejeton->select_jeton_valid($_POST["jeton"]);
                          if($jeton != ""){

                              if((uploadedImg($_FILES["photo_n"],"/img/")) === TRUE){
                                 echo '6';
                               $managNews = new Dao_news();
                                $managNews->insertNews($news);
                                $this->aff_gestion_articles();
                                
                            }
                          }
                          
                       }
                    }
                }
                
            }

        $this->afficher_form_crea();
    }
    
    public function action_suprimer() {
        if(isset($_POST["id_n"]) && is_array($_POST["id_n"])){   
            
            for ($i =0; $i <= count($_POST["id_n"]);$i++){
               $news = new News(array("id_n"=>$_POST["id_n"][$i]));
               if($news->getId_n() != ""){
                   
                   $managNews = new Dao_news();
                   $managNews->news_sup($news);
               }
             
            }
            $this->aff_gestion_articles();
        }
        $this->aff_gestion_articles();
    }

    
}

?>
