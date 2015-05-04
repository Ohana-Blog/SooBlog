<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_news
 *
 * @author bbpomme
 */
class Dao_news extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    
    function nbr_page() {
        $select = $this->bd->query("SELECT COUNT(id_n) as nbr FROM news");
        $data =  $select->fetch();
        
       return $data["nbr"]; 
    }
    
    function nbr_page_rubrique($id_r) {
        $select = $this->bd->prepare("SELECT COUNT(id_n) as nbr FROM news WHERE fk_id_r =?");
        $select->execute(array($id_r));
        $data =  $select->fetch();
        
       return $data["nbr"]; 
    }

    function afficher_pagination($article_par_page,$get_page = 1)
    {   
        try {
            $select = $this->bd->query("SELECT id_n,titre_n,news,DATE_FORMAT(date_n,'%d/%m/%Y') as date_n,photo_n,title_n,alt_n 
                                                    FROM news                                                
                                                    ORDER BY date_n DESC LIMIT ".(($get_page - 1)* $article_par_page).",".$article_par_page);
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
//
//        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
//            throw new Dao_articles_Exeption("Pas de données article");
//        }
        
         while(($donnees = $select->fetch(PDO::FETCH_ASSOC)) !== FALSE){
           
            $news[] = new News($donnees);
            
        }
   
        return $news;
    }
    
    function afficher_pagination_rubrique($id_ir,$article_par_page,$get_page = 1)
    {   
        try {
            if(is_numeric($id_ir)){
                $id = htmlspecialchars($id_ir);
            }
             $news = array();
             
            $select = $this->bd->query("SELECT id_n,titre_n,news,DATE_FORMAT(date_n,'%d/%m/%Y') as date_n,photo_n,title_n,alt_n 
                                                    FROM news 
                                                    WHERE fk_id_r = '".$id."'
                                                    ORDER BY date_n DESC LIMIT ".(($get_page - 1)* $article_par_page).",".$article_par_page);
            
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
//
//        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
//            throw new Dao_articles_Exeption("Pas de données article");
//        }
  
         while(($donnees = $select->fetch(PDO::FETCH_ASSOC)) !== FALSE){
       
            $news[] = new News($donnees);
            
        }
        
        return $news;
    }
    
    public function news(){
        try {
            $news=array();
            $select = $this->bd->query("SELECT id_n, titre_n,date_n FROM news ORDER BY date_n DESC");
        } catch (PDOException $pdoE) {
            throw $pdoE;
        }
        
        while($donnees = $select->fetch(PDO::FETCH_ASSOC)){
            
               $news[]= new News($donnees); 
         }

         return $news;
        
    }
    
    public function modifier_news(News $news) {
        $update = $this->bd->prepare("UPDATE news SET date_n = ?, news =?, titre_n=?,photo_n=?,title_n=?,alt_n=? 
                                            WHERE id_n =?");
        $update->execute(array($news->getDate_n(),$news->getNews(),$news->getTitre_n(),$news->getPhoto_n(),$news->getTitle_n(),$news->getAlt_n(),$news->getId_n()));
    }


    public function news_id($id_n){
        try {
            $select = $this->bd->prepare("SELECT * FROM news WHERE id_n = ?");
            $select->execute(array($id_n));
          
        } catch (PDOException $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
                throw new Dao_news_Exeption("Pas de données pour la news de saisie");
         }
       
         $news = new News($donnees);
         
       
         
         return $news;
        
    }
    
    public function news_sup(News $news) {
          try {
            $delete = $this->bd->prepare("DELETE FROM news WHERE id_n = ?");
            $delete->execute(array($news->getId_n()));
            unset($delete);
            $delete = $this->bd->prepare("DELETE FROM page WHERE fk_id_n = ?");
            $delete->execute(array($news->getId_n()));

        } catch (PDOException $pdoE) {
            throw $pdoE;
        } 
    }

}
class Dao_news_Exeption extends Exception{
    
}
?>
