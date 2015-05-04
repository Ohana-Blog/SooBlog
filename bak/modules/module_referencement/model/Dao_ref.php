<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_ref
 *
 * @author bbpomme
 */
class Dao_ref extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
        
    }
    
    public function select_titre_article(){
        $ref = array();
        $select = $this->bd->query("SELECT * FROM page ORDER BY id_page DESC");
        $select->execute();
        
        while ($donnees = $select->fetch(PDO::FETCH_ASSOC)){
            
          $ref[] = new Page($donnees);
        }

        return $ref;
    }
    
    public function select_id_article($id){

        try {
            
                $select = $this->bd->prepare("SELECT * FROM page WHERE id_page = ?");
                $select->execute(array($id));
            
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_ref_Exeption("L'id de cette article n'existe pas");
        }
 
          $ref = new Page($donnees);
       

        return $ref;
    }

    public function update(Page $page) {
       $update = $this->bd->prepare("UPDATE page SET description_p = ?, mot_clefs = ? WHERE id_page = ?");
       $update->execute(array($page->getDescription_p(),$page->getMot_clefs(),$page->getId_page()));
    }
    
    public function ref_delete(Page $page) {
        $delete = $this->bd->prepare("DELETE FROM page WHERE id_page = ?");
        $delete->execute(array($page->getId_page()));
    }
    
}

class Dao_ref_Exeption extends Exception{

}

?>
