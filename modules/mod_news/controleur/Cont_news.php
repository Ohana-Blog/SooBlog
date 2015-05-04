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
         require_once Parametre::$MVC_BASE.'/modules/mod_news/model/Dao_news.php'; 
         require_once Parametre::$MVC_BASE.'/modules/mod_news/vue/Vue_news.php';
         //require_once Parametre::$MVC_BASE.'/helpers/vue_generique.php';
         require_once Parametre::$MVC_BASE.'/entities/News.php'; 
         require_once Parametre::$MVC_BASE.'/entities/Jeton.php'; 
         require_once Parametre::$MVC_BASE.'/entities/Rubrique.php'; 
         require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
         require_once Parametre::$MVC_BASE.'/bak/modules/module_news/model/Dao_rubrique.php';
    }
    
    public function aff_articles() {

          try {
                
                if(isset($_GET["p"]))
                {
                    $get_page = $_GET["p"];
                }
                else
                {
                    $get_page = 1;
                }
                
                

            // nombre de page fonction ceil pour arrondire page supérieur
            
                $manageRubrique = new Dao_rubrique();
                $donnees["rubrique"] = $manageRubrique->select_rubriques();
                       
                $manageNews = new Dao_news();
                $nbr_article = $manageNews->nbr_page();
                 $donnees["page"] =  ceil($nbr_article/10);
                $donnees["news"] = $manageNews->afficher_pagination(10, $get_page);
            
            $this->titre ="News";
            $this->vue= new Vue_news();
            $this->method_vue = "news";
            $this->parametre = $donnees;
            
            
            
        } catch (Dao_news_Exeption $e) {
            $this->vue = new Vue_news();
            $this->method_vue ="Error_message";
            $this->parametre=$e->getMessage();
        }
    }
    
    public function aff_articles_rubrique() {

          try {
                 if(isset($_POST["id_r"])){
                     
                     if(isset($_GET["p"]))
                     {
                         $get_page = $_GET["p"];
                     }
                     else
                     {
                         $get_page = 1;
                     }
                
                

                    // nombre de page fonction ceil pour arrondire page supérieur

                    $manageRubrique = new Dao_rubrique();
                    $donnees["rubrique"] = $manageRubrique->select_rubriques();

                    $manageNews = new Dao_news();
                    $nbr_article = $manageNews->nbr_page_rubrique($_POST["id_r"]);
                    $donnees["page"] =  ceil($nbr_article/10);
                    $donnees["news"] = $manageNews->afficher_pagination_rubrique($_POST["id_r"],10, $get_page);

                    $this->titre ="News";
                    $this->vue= new Vue_news();
                    $this->method_vue = "news";
                    $this->parametre = $donnees;
               } 
                
            
            
            
        } catch (Dao_news_Exeption $e) {
            $this->vue = new Vue_news();
            $this->method_vue ="Error_message";
            $this->parametre=$e->getMessage();
        }
    }
    
    public function aff_une_news() {
        
        if(isset($_GET["id_n"])){
            if(is_numeric($_GET["id_n"])){
                $news = new News(array("id_n"=>$_GET["id_n"]));
                
                if($news->getId_n() !=""){
                    $manageNews = new Dao_news();
                    $donnees["news"] = $manageNews->news_id($news->getId_n());

                    $this->titre ="News";
                    $this->vue= new Vue_news();
                    $this->method_vue = "une_news";
                    $this->parametre = $donnees;
                }
            }
        }else{
          $this->aff_articles();  
        }
        
        
            
    }

}

?>
