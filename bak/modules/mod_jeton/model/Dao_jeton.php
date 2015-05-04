<?php
require_once Parametre::$MVC_BASE.'/helpers/DaoConnect.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dao_jeton
 *
 * @author bbpomme
 */
class Dao_jeton extends DaoConnect{
    //put your code here
    function __construct() {
        parent::bdConnect();
    }
    function insert_jeton(Jeton $jeton){
        $insert = $this->bd->prepare("INSERT INTO jeton (string, date_j) VALUES (?,NOW())");
        $insert->execute(array($jeton->getString()));
        
    }
    
    function select_jeton_valid($jeton,$temps = 30){
        $select = $this->bd->prepare("SELECT * FROM jeton WHERE string = ? AND CURDATE() < ADDDATE(date_j , INTERVAL  ? MINUTE)");
        $select->execute(array($jeton,$temps));

       if(($donnee = $select->fetch(PDO::FETCH_ASSOC)) === FALSE){
           
           return FALSE;
       }
        
        $jet = new Jeton(30,$donnee);

        return $jet;
    }
    
    function select_nbr_jeton_valid($temps = 30){
        $select = $this->bd->prepare("SELECT string FROM jeton WHERE CURDATE() > ADDDATE(date_j , INTERVAL  ? MINUTE)");
        
        $select->execute(array($temps));
        $donnees = $select->fetch(PDO::FETCH_ASSOC);        
        var_dump($donnees);

        
        return $donnees;
    }
    
    function delete_jeton($temps = 30) {
        $delete = $this->bd->prepare("DELETE FROM jeton WHERE CURDATE() > ADDDATE(date_j , INTERVAL  ? MINUTE)");
        $delete->execute(array($temps));
    }
    
    
    function delete_par_string($string){
        $delete = $this->bd->prepare("DELETE FROM jeton WHERE string = ?");
        $delete->execute(array($string));
    }
    
    function select_jetons(){
        
        $jetons = array();
        
        $select = $this->bd->query("SELECT * FROM jeton");
        $select->execute();
        
        while ($donnees = $select->fetch(PDO::FETCH_ASSOC)){
            
            $jetons[] = new Jeton(30,$donnees);
        }
        
        return $jetons;  
    }
}
class Dao_jeton_Exeption extends Exception{

}

?>
