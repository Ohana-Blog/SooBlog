<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_commentaire
 *
 * @author bbpomme
 */
class Vue_commentaire {
    //put your code here
    public function forms($donnees) {
//        var_dump($donnees);
     ?>

        <section class="bak-section-class-commentaire">
            <input type="button" id="affichage" value="Voir les commentaires"/>
            <h2>Liste des commentaire à afficher</h2>
            <?php 
                for($i=0;$i<COUNT($donnees["donnees"]);$i++){
            ?>
            <h3>Commentaire n° <?php echo $i+1;?></h3>
                <form action="index.php?module=commentaire&action=modifier" method="post">
                    <p>ID : <?php echo $donnees["donnees"][$i]->getId_com();?><input type="hidden" name="id_com" value="<?php echo $donnees["donnees"][$i]->getId_com();?>"</p>
                    <article>
                      <p>Commentaire : <?php echo $donnees["donnees"][$i]->getCommentaire();?></p>  
                    </article>
                    <p> Pseudo : <?php echo $donnees["donnees"][$i]->getPseudo();?></p>
                    <p> IP : <?php echo $donnees["donnees"][$i]->getIp();?></p>
                    <INPUT type= "radio" name="afficher" value="oui"> afficher<br/>
                    <INPUT type= "radio" name="afficher" value="effacer"> Effacer le commentaire<br/>
                    <input type="submit" name="modifier" value="Afficher le commentaire <?php echo $i+1?>"/>
                </form>
            <?php 
                }
            ?>
        </section>


     <?php
    }
}

?>
