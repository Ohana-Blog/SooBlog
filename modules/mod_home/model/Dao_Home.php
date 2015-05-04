<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_Home
 *
 * @author bbpomme
 */
class Dao_Home extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    
    public function selectHome(){
        try{
            $select = $this->bd->query("SELECT * FROM Soo ORDER BY id_s DESC");
            
             
        }catch (PDOException $pdoE){
                throw $pdoE;
        }
        
        if(($donnees = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
                throw new Dao_home_Exeption("Pas de données pour la home de saisie");
         }
             
            
            
         $home = new Soo($donnees);
         
         return $home;
    }

}
class Dao_Home_Exeption extends Exception{

}


