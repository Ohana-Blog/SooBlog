<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_nav
 *
 * @author bbpomme
 */
class Vue_nav {
    //put your code here
    public function nav(){
    ?>
        <section id="bak-section-id-nav">
            <ul>
                <li><a href="index.php?module=rubrique">RUBRIQUE</a></li>
                <li><a href="index.php?module=article">ARTICLE</a></li>
                <li><a href="index.php?module=news&action=gestion">NEWS</a></li>
                <li><a href="index.php?module=referencement">REFERENCEMENT</a></li>
                <li><a href="index.php?module=jeton">PURGE JETONS</a></li>
                <li><a href="index.php?module=commentaire&action=gestion">COMMENTAIRE</a></li>
                <li><a href="index.php?module=user&action=gestion">INSCRIT NEWSLETTERS</a></li>
            </ul>
        </section>
    

    <?php
    }
}

?>
