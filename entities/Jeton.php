<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jeton
 *
 * @author bbpomme
 */
class Jeton {
    //put your code here
     protected $id_j;
    protected $string;
    protected $date_j;
    
    
    function __construct($nbr_char, $donnees = NULL) {
        
        if($donnees === NULL){        
            $char= "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN1234567890";
            $char = str_split($char);


           $result="";
           for($i=0; $i<$nbr_char;$i++){
                $indice = rand(0, count($char)-1);
                $result .= $char[$indice];          
           }

           $this->string = $result;
        }else{
            $this->id_j = $this->setId_j($donnees['id_j']);
            $this->string = $this->setString($donnees['string']);
            $this->date_j = $this->setDate_j($donnees['date_j']);
        }
      
      
    }
    
    public function getId_j() {
        return $this->id_j;
    }

    public function setId_j($id) {
        $this->id_j = $id;
    }

    public function getString() {
        return $this->string;
    }

    public function setString($string) {
        $this->string = $string;
    }

    public function getDate_j() {
        return $this->date_j;
    }

    public function setDate_j ($date) {
        $this->date_j = $date;
    }


}

?>
