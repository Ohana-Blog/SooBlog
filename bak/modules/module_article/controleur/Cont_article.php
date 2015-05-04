<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_article
 *
 * @author bbpomme
 */
class Cont_article extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/bak/modules/module_article/vue/Vue_article.php';
        require_once Parametre::$MVC_BASE.'/bak/modules/module_article/model/Dao_article.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        require_once Parametre::$MVC_BASE.'/helpers/DaoJeton.php';
        require_once Parametre::$MVC_BASE.'/entities/Article.php';
        
    }
    
    public function aff_forms($donnee=NULL){
        
        try {
            $articleManage = new Dao_article();
            $donnees = $articleManage->article_par_date();
            
            $this->titre ="Gestion des articles";
            $this->vue = new Vue_article();
            $this->method_vue ="forms";
            $this->parametre = array("articles"=>$donnees,"article"=>$donnee);
            
        } catch (Exception $e){
            echo $e->getMessage();
        }
        
    }
    
    public function action_selection() {
        try {
            
            if(isset($_POST["selection"])){
                
                if(is_numeric($_POST["id_article"]) && $_POST["id_article"] > 0){
                    
                    $article = new Article(array("id_article"=>$_POST["id_article"]));
                    if($article->getId_article() !=""){
                        $articleManage = new Dao_article();
                        $donnees = $articleManage->select_un_article($article->getId_article());
                        
                        
                        $this->aff_forms($donnees);
                    }
                }else{
                $this->aff_forms();
            }
            }else{
                $this->aff_forms();
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
   }
   
   public function action_insert(){
       if(isset($_POST["insert"])){
           if(isset($_POST["titre_a"]) && $_POST["titre_a"] !=""){
               if(isset($_POST["article"]) && $_POST["article"] !=""){
                   if(isset($_POST["title"]) && $_POST["title"] !=""){
                       if(isset($_POST["alt"]) && $_POST["alt"] !=""){
                           if(isset($_FILES["photo_a"]["name"])){
                               $article = new Article(array("titre_a"=>$_POST["titre_a"],"article"=>$_POST["article"],"resume_a"=>$_POST["article"],"photo_a"=>$_FILES["photo_a"]["name"],"title"=>$_POST["title"],"alt"=>$_POST["alt"]));

                                   
                               if($article->getArticle() !=""){
                                   if((uploadedImg($_FILES["photo_a"],"/img/")) === TRUE){
                                        $artilceMange = new Dao_article();
                                        $artilceMange->insertArticle($article);
                                        var_dump($article);
                                        $this->aff_forms(); 
                                   }
                               }
                               
                            }

                       }
                   }
               }
           }else{
               $this->aff_forms();
           }
       }else{
           $this->aff_forms();
       }
       $this->aff_forms();
   }
   
   
   public function action_update(){
       if(isset($_POST["modif"])){
                      if(isset($_POST["titre_a"]) && $_POST["titre_a"] !=""){
               if(isset($_POST["article"]) && $_POST["article"] !=""){
                   if(isset($_POST["title"]) && $_POST["title"] !=""){
                       if(isset($_POST["alt"]) && $_POST["alt"] !=""){
                           if(isset($_FILES["photo_a"]["name"])){
                               $article = new Article(array("id_article"=>$_POST["id_article"],"titre_a"=>$_POST["titre_a"],"article"=>$_POST["article"],"resume_a"=>$_POST["article"],"photo_a"=>$_FILES["photo_a"]["name"],"title"=>$_POST["title"],"alt"=>$_POST["alt"]));

                                   
                               if($article->getArticle() !=""){
                                   
                                   if((uploadedImg($_FILES["photo_a"],"/img/")) === TRUE){
                                       echo 'YES';
                                        $artilceMange = new Dao_article();
                                        $artilceMange->updateArticle($article);
                                        var_dump($article);
                                        $this->aff_forms(); 
                                   }
                               }
                               
                            }

                       }
                   }
               }
           }else{
               $this->aff_forms();
           }
       }
       
       $this->aff_forms();
   }
   
   public function action_delete(){
       if(isset($_POST["Suprimer"])){
           if(isset($_POST["id_article"]) && is_numeric($_POST["id_article"])){
               $managArticle = new Dao_article();
               $managArticle->deleteArticle($_POST["id_article"]);
               $this->aff_forms();
           }
       }
       $this->aff_forms();
   }

}

?>
