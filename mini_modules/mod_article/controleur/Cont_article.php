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
        require_once Parametre::$MVC_BASE.'/mini_modules/mod_article/vue/Vue_Article.php';
        require_once Parametre::$MVC_BASE.'/entities/Article.php';
        require_once Parametre::$MVC_BASE.'/helpers/Controleur.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        require_once Parametre::$MVC_BASE.'/mini_modules/mod_article/model/Dao_Article.php';
    }
    
    public function afficher_mini_mod_article(){
        $manage_article = new Dao_Article();
        
        try {
            
            $donnees = $manage_article->select_last_article();

            $this->vue = new Vue_Article();
            $this->method_vue ="last_article";
            $this->parametre =array("id_article"=>$donnees->getId_article(),"titre_a"=>$donnees->getTitre_a(),"resume_a"=>$donnees->getResume_a(),"date_a"=>$donnees->getDate_a(),"photo_a"=>$donnees->getPhoto_a(),"title"=>$donnees->getTitle(),"alt"=>$donnees->getAlt());
            
        } catch (Dao_Article_Expetiontion $e) {
            $this->vue= new Vue_Article();
            $this->method_vue="Error_message";
            $this->parametre = $e->getMessage();
        }
    }
    


}

?>
