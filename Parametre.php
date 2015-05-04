<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parametre
 *
 * @author bbpomme
 */
class Parametre {
    //put your code here
    
    public static $MVC_BASE ="";
    
    public static function init(){
        self::$MVC_BASE = dirname(__FILE__);
    }
}

?>
