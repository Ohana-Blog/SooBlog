<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_generique
 *
 * @author bbpomme
 */
class Vue_generique {
    //put your code here
    function error_message($error) {
        ?>
            <div class="div-error-expetion">
                <?php echo $error;?>
            </div>
        <?php
    }
}

?>
