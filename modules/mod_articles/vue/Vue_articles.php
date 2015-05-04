<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_articles
 *
 * @author bbpomme
 */
class Vue_articles extends Vue_generique{
    //put your code here
    public function tout_les_articles($donnees){
        ?>
<section id="mod-articles-section-id">
    <?php
        $articles = $donnees["article"];
       
            for($i=0;$i<count($articles);$i++) {
     
    ?>
    <article class="mod-articles-article-class">
        <h4><?php if(isset($articles[$i])) echo $articles[$i]->getTitre_a();?></h4>
        <p><?php if(isset($articles[$i])) echo $articles[$i]->getArticle();?></p>
        <p><?php if(isset($articles[$i])) echo $articles[$i]->getResume_a();?></p>
        <p><?php if(isset($articles[$i])) echo $articles[$i]->getDate_a();?></p>
        <div class="mod-articles-div-class">
            <a href="index.php?module=articles&action=article&id_article=<?php if(isset($articles[$i])) echo $articles[$i]->getId_article();?>"><img src="<?php Parametre::$MVC_BASE;?>/img/<?php if(isset($articles[$i])) echo  $articles[$i]->getPhoto_a();?>" title="<?php if(isset($articles[$i])) echo $articles[$i]->getTitle();?>" alt="<?php if(isset($articles[$i])) echo $articles[$i]->getAlt();?>" height="200" width="200"/></a>
        </div>
    </article>
   <?php
            }
  
    
 
    $page="";
            for ($i=1;$i<=$donnees["nbr_page"];$i++)
            {
   ?>
                
               <section id='pagination'>
                   <a class='lien-pagination' href='index.php?module=articles&p=<?php echo $i;?>'><?php echo $i;?></a>/
               </section>
                
   <?php
            }
            echo $page;
   ?>
 </section>
   <?php
    }

    public function un_article($donnees){
     
        $coms =$donnees["commentaire"];
        $jeton = $donnees["jeton"];
              ?>

              <section id="mod-articles-section-id">

                <article class="mod-articles-article-class">
                    <h4><?php if(isset($donnees)) echo $donnees["article"]->getTitre_a();?></h4>
                    <p><?php if(isset($donnees)) echo $donnees["article"]->getArticle();?></p>
                    <p><?php if(isset($donnees)) echo $donnees["article"]->getResume_a();?></p>
                    <p><?php if(isset($donnees)) echo $donnees["article"]->getDate_a();?></p>
                    <div class="mod-articles-div-class">
                        <img src="<?php Parametre::$MVC_BASE;?>/img/<?php if(isset($donnees)) echo  $donnees["article"]->getPhoto_a();?>" title="<?php if(isset($donnees)) echo $donnees["article"]->getTitle();?>" alt="<?php if(isset($donnees)) echo $donnees["article"]->getAlt();?>" height="200" width="200"/>
                    </div>
                </article>

       
              </section>

<section id="mod-commentaires-section-id">
    <article id="mod-commentaires-article-class">
        <form action="index.php?module=articles&action=commentaire" method="post">
            <label>Pseudo : </label><input type="text" name="pseudo" /><br/>
            <label>Mail : </label><input type="email" name="mail" /><br/>
            <label>Commentaire : </label><textarea name="commentaire" placeholder="Laisser un commentaire..."></textarea><br/>
            <input type="hidden" name="jeton" value="<?php if(isset($jeton)) echo $jeton->getString();?>"/>
            <input type="hidden" name="id_article" value="<?php if(isset($donnees)) echo $donnees["article"]->getId_article();?>"/>
            <input type="submit" value="Laisser mon commentaire"/>
        </form>
        
    </article>
    
</section>

<section id="mod-commentaires-section-id">
    <?php

   foreach ($coms as $com) {
                ?>
            <article>
                <p><?php echo $com->getPseudo(); ?></p>
                     <p><?php echo $com->getCommentaire(); ?></p>
                          <p><?php echo $com->getDate_com()?></p>
            </article>
    
                <?php
            }
   ?>
</section>

            <?php
    }
}

