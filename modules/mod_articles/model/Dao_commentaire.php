<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_commentaire
 *
 * @author bbpomme
 */
class Dao_commentaire extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    
    public function select_coms() {
        $com = array();
        $select = $this->bd->query("SELECT id_com,commentaire,pseudo,ip FROM commentaire WHERE afficher =''");

        while (($donnees = $select->fetch(PDO::FETCH_ASSOC)) !== FALSE){
            $com[] = new Commentaire($donnees);
        }
        
        return $com;
    }
    
     public function select_coms_fk_art($fk_id_art) {
        $com = array();
        $select = $this->bd->prepare("SELECT id_com,commentaire,pseudo,ip FROM commentaire WHERE fk_id_art = ? AND afficher ='oui'");
        $select->execute(array($fk_id_art));

        while (($donnees = $select->fetch(PDO::FETCH_ASSOC)) !== FALSE){
            $com[] = new Commentaire($donnees);
        }
        
        return $com;
    }
    
    public function afficher_com(Commentaire $com) {
        $update = $this->bd->prepare("UPDATE commentaire SET afficher = ? WHERE id_com = ?");
        $update->execute(array($com->getAfficher(), $com->getId_com()));
    }
    
    public function insert_com(Commentaire $commentaire) {
        $insert = $this->bd->prepare("INSERT INTO commentaire (date_com,commentaire,pseudo,fk_id_art,afficher,ip) VALUES(NOW(),?,?,?,'',?)");
        $insert->execute(array($commentaire->getCommentaire(),$commentaire->getPseudo(),$commentaire->getFk_id_art(),$commentaire->getIp()));
    }










    public function suprimer_com(Commentaire $com) {
        $delete = $this->bd->prepare("DELETE FROM commentaire WHERE id_com =?");
        $delete->execute(array($com->getId_com()));
    }

}

class Dao_commentaire_Exeption extends Exception{
    
}

?>
