<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of header
 *
 * @author bbpomme
 */
class header {
    //put your code here
    public function header() {
        ?>
            <nav>
                <ul>
                    <li><a href="index.php?module=home&action=home">Acceuil</a></li>
                    <li><a href="index.php?module=articles">Articles</a></li>
                    <li><a href="index.php?module=news">News</a></li>
                    <li><a href="index.php?module=contact">Contact</a></li>
                </ul>
            </nav>
            <section id="main">
        <?php
        
    }
}

?>
