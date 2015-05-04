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
    
    public function insertNews(News $news) {
        $insert = $this->bd->prepare("INSERT INTO news (date_n, news, titre_n,photo_n,title_n,alt_n,fk_id_r) VALUES (NOW(),?,?,?,?,?,?)");
        $insert->execute(array($news->getNews(),$news->getTitre_n(),$news->getPhoto_n(),$news->getTitle_n(),$news->getAlt_n(),$news->getFk_id_r()));
        
        
        //---------------
        
        unset($insert);
        
        $select = $this->bd->query("SELECT id_n,titre_n FROM news WHERE id_n = LAST_INSERT_ID()");
        
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_news_Exeption("L'id de cette article n'existe pas");
        }
        
        $news = new News($donnees);
        
        
       $insert_r = $this->bd->prepare("INSERT INTO page (titre_p, fk_id_n,nom_table) VALUES (?,?,'news')");
       $insert_r->execute(array($news->getTitre_n(),$news->getId_n()));
    }
    
    public function news(){
        try {
            $news=array();
            $rubrique=array();
            $select = $this->bd->query("SELECT id_n, titre_n,date_n,fk_id_r,rubrique FROM news
                                                                                        LEFT JOIN rubrique
                                                                                        ON fk_id_r = id_r
                                                                                        ORDER BY date_n DESC");
        } catch (PDOException $pdoE) {
            throw $pdoE;
        }
        
        while($donnees = $select->fetch(PDO::FETCH_ASSOC)){
            
               $news[]= new News($donnees); 
               $rubrique[]= new Rubrique($donnees);
         }
            $tabObj["news"] =$news;
            $tabObj["rubrique"] =$rubrique;
            
         return $tabObj;
        
    }
    
    public function modifier_news(News $news) {
        $update = $this->bd->prepare("UPDATE news SET date_n = ?, news =?, titre_n=?,photo_n=?,title_n=?,alt_n=?, fk_id_r = ?
                                            WHERE id_n =?");
        $update->execute(array($news->getDate_n(),$news->getNews(),$news->getTitre_n(),$news->getPhoto_n(),$news->getTitle_n(),$news->getAlt_n(),$news->getFk_id_r(),$news->getId_n()));
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
