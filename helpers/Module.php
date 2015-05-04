<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pro
 *
 * @author bbpomme
 */
class Module{
    //put your code here
    protected $control;
    
    public function display() {
        $this->control->display();
    }
    
    public function getControl(){
        return $this->control;
    }
}

?>
