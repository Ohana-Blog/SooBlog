<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_article
 *
 * @author bbpomme
 */
class Dao_article extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();  
    }
    
    public function article_par_date(){
        $articles = array();
        $select = $this->bd->query("SELECT id_article,titre_a FROM article ORDER BY date_a");
        while ($donnees = $select->fetch(PDO::FETCH_ASSOC)){
          $articles[] = new Article($donnees); 
        }
        
        return $articles;
    }
    
    public function select_un_article($id) {
        try {
            
             $select = $this->bd->prepare("SELECT * FROM article WHERE id_article = ?");
             $select->execute(array($id));
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_article_Exeption("L'id de cette article n'existe pas");
        }
        
        $article = new Article($donnees);

        return $article;
    }
    
    public function insertArticle(Article $article) {
        $insert = $this->bd->prepare("INSERT INTO article (titre_a,article,resume_a,date_a,photo_a,title,alt) VALUES(?,?,?,NOW(),?,?,?)");
        $insert->execute(array($article->getTitre_a(),$article->getArticle(),$article->getResume_a(),$article->getPhoto_a(),$article->getTitle(),$article->getAlt()));
        unset($insert);
        
        $select = $this->bd->query("SELECT id_article,titre_a FROM article WHERE id_article = LAST_INSERT_ID()");
        
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_article_Exeption("L'id de cette article n'existe pas");
        }
        
        $article = new Article($donnees);
        
        
       $insert_r = $this->bd->prepare("INSERT INTO page (titre_p, fk_id_article,nom_table) VALUES (?,?,'article')");
       $insert_r->execute(array($article->getTitre_a(),$article->getId_article()));
    }
    
    public function updateArticle(Article $article){
        $update = $this->bd->prepare("UPDATE article SET titre_a = ?, article = ?, resume_a = ?,photo_a= ?,title = ?,alt = ? WHERE id_article = ?");
        $update->execute(array($article->getTitre_a(),$article->getArticle(),$article->getResume_a(),$article->getPhoto_a(),$article->getTitle(),$article->getAlt(),$article->getId_article()));
    }
    
    public function deleteArticle($id){
        $delete = $this->bd->prepare("DELETE FROM article WHERE id_article = ?");
        $delete->execute(array($id));
        unset($delete);
        $delete = $this->bd->prepare("DELETE FROM page WHERE fk_id_article = ?");
        $delete->execute(array($id));
        
    }

}
class Dao_article_Exeption extends Exception{

}

?>
