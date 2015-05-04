<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_Article
 *
 * @author bbpomme
 */
class Vue_Article {
    //put your code here
    public function last_article($donnees){
        ?>
<section id="mini-mod-article-id">
    <article id="mini-mod-article-class">
        <h4><?php echo $donnees["titre_a"];?></h4>
        <p><?php echo $donnees["resume_a"];?></p>
        <p><?php echo $donnees["date_a"];?></p>
        <div id="mini-mod-div-id">
            <a href="index.php?module=articles&action=article&id_article=<?php echo $donnees["id_article"]?>"><img src="img/<?php echo $donnees["photo_a"];?>" title="<?php echo $donnees["title"]?>" alt="<?php echo $donnees["alt"]?>" height="200" width="200" /></a>
            
        </div>
    </article>
</section>

        <?php
    }
}

?>
