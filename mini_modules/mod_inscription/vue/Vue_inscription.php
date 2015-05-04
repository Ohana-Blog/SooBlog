<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_inscription
 *
 * @author bbpomme
 */
class Vue_inscription {
    //put your code here
 public function form_inscription($jeton){
        ?>
            <section id="section-inscription">
                <h3>Formulaire d'inscription</h3>
                <form method="post" action="index.php?module=inscription&action=enr_inscription" id="form-inscription">
                    <label class="label-inscription">Pseudo : </label><input type="text" name="pseudo"/><br/>
                    <label class="label-inscription">Email : </label><input type="email" name="mail"/><br/>
                    <label class="label-inscription">Mot de passe : </label><input type="password" name="mdp" min="6"/><br/>
                    <label class="label-inscription">Confirmer mot de passe : </label><input type="password" name="conf_mdp" min="6"/><br/>
                    <input type="hidden" name="string" value="<?php echo $jeton["jeton"];  ?>"/>
                        
                    <input type="submit" name="envoi" value="OK"/><br/>
                    <span><?php if(isset($jeton["msg"]) && $jeton["msg"] === TRUE) echo "L'inscription est validée"?></span>
                </form>
            </section>
            

        <?php
    }
}

?>
