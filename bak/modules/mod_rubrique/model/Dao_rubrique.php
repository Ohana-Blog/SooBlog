<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_rubrique
 *
 * @author bbpomme
 */
class Dao_rubrique extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    
    public function rubriques() {
        $rubrique = array();
        
        $select = $this->bd->query("SELECT * FROM rubrique");
        
        while ($donnees = $select->fetch(PDO::FETCH_ASSOC)){
            $rubrique[] = new Rubrique($donnees);
        }
        
        return $rubrique;
    }
    
    public function rubrique_id(Rubrique $rubrique) {
        $select = $this->bd->prepare("SELECT * FROM rubrique WHERE id_r = ?");
        $select->execute(array($rubrique->getId_r()));
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
                throw new Dao_rubrique_Exeption("Pas de données pour la news de saisie");
         }
         
         $rubrique = new Rubrique($donnees);
         
         return $rubrique;
    }
    
    public function rubrique_modif(Rubrique $rubrique){
        $update = $this->bd->prepare("UPDATE rubrique SET rubrique = ? WHERE id_r = ?");
        $update->execute(array($rubrique->getRubrique(),$rubrique->getId_r()));
    }
    
    public function rubrique_sup(Rubrique $rubrique){
        $delete = $this->bd->prepare("DELETE FROM rubrique WHERE id_r = ?");
        $delete->execute(array($rubrique->getId_r()));
    }
    
    public function rubrique_creer(Rubrique $rubrique){
        $insert = $this->bd->prepare("INSERT INTO rubrique (rubrique) VALUES (?)");
        $insert->execute(array($rubrique->getRubrique()));
    }
    
    

}

class Dao_rubrique_Exeption extends Exception{

}

?>
