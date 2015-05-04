<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_news
 *
 * @author bbpomme
 */
class Mod_news extends Module{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/modules/mod_news/controleur/Cont_news.php';
        
        $this->control = new Cont_news();
        
         if(isset($_GET["action"]) && !empty($_GET["action"])){
            $action = $_GET["action"];   
        }else{
         $action ="";
        }
      
        switch ($action) {
            
            case "affiner":
                $this->control->aff_articles_rubrique();
                
                break;
            case "news":
                $this->control->aff_une_news();
                
                break;

            default:
                 $this->control->aff_articles();
                break;
        }
    }

}

?>
