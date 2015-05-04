<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mode_articles
 *
 * @author bbpomme
 */
class Mode_articles extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/modules/mod_articles/controleur/Cont_articles.php';
        $this->control = new Cont_articles();
        
        if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
        }else{
         $action ="";
        }
      
        switch ($action) {
            case "articles":
                $this->control->afficher_tout_les_articles();
                
                break;
           case "article":
                $this->control->afficher_article_id();
                
                break;
           case "commentaire":
                $this->control->action_enr_com();
                
                break;

            default:
                 $this->control->afficher_tout_les_articles();
                break;
        }
        
    }

}

?>
