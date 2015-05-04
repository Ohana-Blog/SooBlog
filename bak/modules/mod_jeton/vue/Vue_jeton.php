<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_jeton
 *
 * @author bbpomme
 */
class Vue_jeton {
    //put your code here
    public function forms($donnees) {
        $jeton = $donnees["jeton"];
        var_dump($jeton);
       ?>

            <section id="bak-section-id-jeton">
                <h1>Jetons</h1>
                <h2>Purger les jetons</h2>
                <table border="1">
                    <form action="index.php?module=jeton&action=purge" method="post">
                        <tr>
                            <th></th><th>#</th><th>Jetons</th><th>Date</th><th>ID</th>
                        </tr>
                        <?php 
                        $i=0;
                               foreach ($jeton as $value) {
                         ?>
                                <tr>
                                    <td></td><td><?php echo $i++;?></td><td><?php echo $value->getString();?></td><td><?php echo $value->getDate_j() ;?></td><td><?php echo $value->getId_j();?></td>
                                </tr>
                        
                        <?php
                               }
                        
                        ?>
                        <tr>
                            <td colspan="5"><input type="submit" name="effacer"value="Purger"/></td>
                        </tr>
                        
                    </form>          
                </table>

            </section>

       <?php
    }
}

?>
