<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_articles
 *
 * @author bbpomme
 */
class Dao_articles extends DaoConnect{
    
    //put your code here
    function __construct() {
        parent::bdConnect();
        
    }
    
    public function select_articles_id($id) {
        
        try {
                $select = $this->bd->prepare("SELECT id_article,titre_a,article,resume_a,DATE_FORMAT(date_a,'%d/%m/%Y') as date_a,photo_a,title,alt
                                                            FROM article
                                                        
                                                   
                                                    WHERE id_article = ?");
                $select->execute(array($id));
                
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_articles_Exeption("l'id decette article n'existe pas");
        }
        
        $article = new Article($donnees);
        

        
        return $article;
    }
    
    
    
    
    function nbr_page() {
        $select = $this->bd->query("SELECT COUNT(id_article) as nbr FROM article");
        $data =  $select->fetch();
        
       return $data["nbr"]; 
    }

    function afficher_pagination($article_par_page,$get_page = 1)
    {   
        try {
            $select = $this->bd->query("SELECT id_article,titre_a,article,resume_a,DATE_FORMAT(date_a,'%d/%m/%Y') as date_a,photo_a,title,alt 
                                                    FROM article                                                
                                                    ORDER BY date_a DESC LIMIT ".(($get_page - 1)* $article_par_page).",".$article_par_page);
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
//
//        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
//            throw new Dao_articles_Exeption("Pas de données article");
//        }
        
         while(($donnees = $select->fetch(PDO::FETCH_ASSOC)) !== FALSE){
           
            $articles[] = new Article($donnees);
            
        }
   
        return $articles;
    }

}
class Dao_articles_Exeption extends Exception{
    
}

?>
