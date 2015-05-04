<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_connection
 *
 * @author bbpomme
 */
class Dao_connection extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    
    public function connexion(User $user){
        
        try {
                $select = $this->bd->prepare("SELECT * FROM user WHERE mail = ? AND mdp = ?");
                $select->execute(array($user->getMail(),md5($user->getMdp())));
//                $data = $select->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $pdoE) {
            throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            return NULL;
        }

           $user = new User($donnees);

        return $user;
    }

}

class Dao_connection_Exeption extends Exception{
    
}

?>
