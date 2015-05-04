<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_Mini_News
 *
 * @author bbpomme
 */
class Dao_Mini_News extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    
    public function last_news(){
        try {
            $select = $this->bd->query("SELECT * FROM news ORDER BY id_n DESC");
        } catch (PDOException $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
                throw new Dao_Mini_News_Exepetion("Pas de données pour la news de saisie");
         }
         
         $news = new News($donnees);
         
         return $news;
        
    }
    
}

class Dao_Mini_News_Exepetion extends Exception{

    

}
?>
