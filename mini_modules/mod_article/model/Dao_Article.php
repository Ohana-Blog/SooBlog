<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_Article
 *
 * @author bbpomme
 */
class Dao_Article extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect(); 
    }
    
    public function select_last_article(){
        try {
            $select = $this->bd->query("SELECT * FROM article ORDER BY id_article DESC");
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_Article_Expetion("Pas de données pour mini mod article de saisie");
        }
        
        $article = new Article($donnees);
        return $article;
    
    }

}

class Dao_Article_Expetion extends Exception{


}

?>
