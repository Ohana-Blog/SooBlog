<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
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
    
    public function select_rubriques() {
        $select = $this->bd->query("SELECT * FROM rubrique");
        
        while ($donnees = $select->fetch(PDO::FETCH_ASSOC)){
            $rubrique[] = new Rubrique($donnees);
        }
        
        return $rubrique;
    }
}

?>
