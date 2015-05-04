<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_News
 *
 * @author bbpomme
 */
class Vue_News {
    //put your code here
    public function last_news($donnees) {
        ?>
            <section id="mini-mod-news-section">
                <article id="mini-mod-news-article">
                    <h4><?php echo $donnees["titre_n"]?></h4>
                    <p><?php echo $donnees["news"]?></p>
                    <p><a href="index.php?module=news&action=news&id_n=<?php echo $donnees["id_n"]; ?>"><img src="img/<?php echo $donnees["photo_n"];?>" title="<?php echo $donnees["title_n"];?>" alt="<?php echo $donnees["alt_n"];?>"height="200" width="200" /></a></p>
                    <p><?php echo $donnees["date_n"]?></p>
                </article>
            </section>

        <?php
    }
}

?>
