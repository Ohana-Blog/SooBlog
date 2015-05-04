<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_connection
 *
 * @author bbpomme
 */
class Vue_connection {
    //put your code here
    public function connect() {
        ?>
            <section id="bak-section-id-connect">
                <form action="index.php?module=se_connecter&action=connection" method="post">
                    <p><label>Email : </label><input type="email" name="mail" /></p>
                    <p><label>Mdp : </label><input type="password" name="mdp" /></p>
                    <input type="submit" name="connect" value="Se connecter"/>
                </form>
            </section>


        <?php
    }
    
     public function deconnection(){
        ?>
            
            <section id="section-deconnection">
               <form action="index.php?module=se_connecter&action=deconnection" method="post">
                   <input type="submit" name="deconnection"value="Se déconnecter"/><br/>
                   
                </form> 
            </section>
        <?php
    }
}

?>
