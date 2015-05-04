<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_home
 *
 * @author bbpomme
 */
class Vue_home {
    //put your code here
    
    public function contenu($donnees) {
        ?>
            <section class="home-section">
                <article id="home-id-qui" class="home-class">
                    <p><?php echo utf8_encode($donnees["qui"]);?></p>
                </article>

            </section>


            <section class="home-section">
                <article id="home-id-quoi" class="home-class">
                    <p><?php echo $donnees["quoi"];?></p>
                </article>
            </section>


            <section class="home-section">
                <article id="home-id-ou" class="home-class">
                    <p><?php echo $donnees["ou"];?></p>
                </article>
            </section>


            <section class="home-section">
                <article id="home-id-quand" class="home-class">
                    <p><?php echo $donnees["quand"]?></p>
                </article>
            </section>


            <section class="home-section">
                <article id="home-id-comment" class="home-class">
                    <p><?php echo utf8_encode($donnees["comment"]);?></p>
                </article>
            </section>

        <?php
    }
    
    
}

?>
