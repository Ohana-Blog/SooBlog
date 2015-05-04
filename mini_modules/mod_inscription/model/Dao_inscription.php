<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_inscription
 *
 * @author bbpomme
 */
class Dao_inscription extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
        
    }
    
    public function insertInscription(User $user) {
        $insert = $this->bd->prepare("INSERT INTO user (pseudo,statut,mail,mdp,date,url) VALUES(?,?,?,?,NOW(),?)");  
        $insert->execute(array($user->getPseudo(),$user->getStatut(),$user->getMail(),md5($user->getMdp()),$user->getUrl()));
        
        
        try {
                $select = $this->bd->prepare("SELECT mail FROM user WHERE id_u = LAST_INSERT_ID()");
                $select ->execute();
                
        } catch (Exception $pdoE) {
            throw $pdoE ;
        }

        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
            throw new Dao_inscription_Exeption("l'id de cette utilisateur n'existe pas");
        }
       
         $user = new User($donnees);
         var_dump($user);
        if(filter_var($user->getMail(), FILTER_VALIDATE_EMAIL)){
            $true = TRUE;
        }
        return $true;
    }

}
class Dao_inscription_Exeption extends Exception{
    
}

?>
