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
        require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_news/model/Dao_Mini_News.php';
        require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_news/vue/Vue_News.php';
        require_once Parametre::$MVC_BASE.'/entities/News.php';
        require_once Parametre::$MVC_BASE.'/helpers/Controleur.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
    }
    
    public function afficher_module_news(){
        $manage_news = new Dao_Mini_News();
        
        try {
            $donnees = $manage_news->last_news();
            
            
            $this->vue = new Vue_News();
            $this->method_vue ="last_news";
            $this->parametre = array("id_n"=>$donnees->getId_n(),"date_n"=>$donnees->getDate_n(),"news"=>$donnees->getNews(),"titre_n"=>$donnees->getTitre_n(),"photo_n"=>$donnees->getPhoto_n());
            
            
        } catch (Dao_Mini_News_Exepetion $e) {
            $this->vue = new Vue_News();
            $this->method_vue="Error_message";
            $this->parametre = $e->getMessage();
        }
    }

}

?>
