<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_article
 *
 * @author bbpomme
 */
class Vue_article {
    //put your code here
    public function forms($donnees){
       
        ?>

<section id="bak-section-id-article">
    
    <section class="bak-section-class-article">
    <h2>Liste de mes articles</h2>
    <form method="post" action="index.php?module=article&action=select">
        <select name="id_article">
            <option>Tout mes articles</option>
            <?php 
                    for($i=0;$i<COUNT($donnees["articles"]);$i++) {
            ?>
            
            <option value="<?php echo $donnees["articles"][$i]->getId_article();?>"><?php echo $donnees["articles"][$i]->getTitre_a();?></option>
            <?php
                    }
            ?>
        </select><br/><br/>
        <input type="submit" name="selection" value="selectionner"/>
    </form>
    </section>
    <section class="bak-section-class-article">
        <h2>Insertion de mes articles</h2>
    <input type="button" name="insertion" value="Inserer mes articles"/>
    <article>
        <form method="post" action="index.php?module=article&action=insert" enctype="multipart/form-data">
           <p><labe>Titre : </labe><input type="text" name="titre_a"/></p>
            <p><labe>Article : </labe><textarea name="article" cols="50" rows="10"></textarea></p>  
            <p><labe>Photo : </labe><input type="file" name="photo_a" /></p>  
            <p><labe>Tilte : </labe><input type="text" name="title" /></p> 
            <p><labe>Alt : </labe><input type="text" name="alt" /></p>
            <input type="submit" name="insert" value="Enregistrer"/>
        </form>
    </article>
    </section>
    
     <section class="bak-section-class-article">
        <h2>Modification de mes articles</h2>
    <input type="button" name="modification" value="Modifier mes articles"/>
    <article>
        <form method="post" action="index.php?module=article&action=modif" enctype="multipart/form-data">
            <p><labe>Id : <?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getId_article();?></labe><input type="hidden" name="id_article"  value="<?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getId_article();?>"/></p>
            <p><labe>Titre : </labe><input type="text" name="titre_a" value="<?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getTitre_a();?>"/></p>
        <p><labe>Article : </labe><textarea name="article" cols="50" rows="10"><?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getArticle();?></textarea></p>  
            <p><labe>Photo : </labe><input type="file" name="photo_a" value="<?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getPhoto_a();?>"/></p>  
            <p><labe>Tilte : </labe><input type="text" name="title" value="<?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getTitle();?>"/></p> 
            <p><labe>Alt : </labe><input type="text" name="alt" value="<?php if(isset($donnees["article"]) && $donnees["article"] !="") echo $donnees["article"]->getAlt();?>"/></p>
            <input type="submit" name="modif" value="Modifier"/>
        </form>
    </article>
    </section>

     <section class="bak-section-class-article">
             <h2>Supression de mes articles</h2> 
            <input type="button" name="supression" value="Suprimer mes articles"/>
            <article>
                <form method="post" action="index.php?module=article&action=supression">
                    <br/><br/>
                    <select name="id_article">
                        <option>Tout mes articles</option>
                        <?php 
                                for($i=0;$i<COUNT($donnees["articles"]);$i++) {
                        ?>

                        <option value="<?php echo $donnees["articles"][$i]->getId_article();?>"><?php echo $donnees["articles"][$i]->getTitre_a();?></option>
                        <?php
                                }
                        ?>
                    </select><br/><br/>
                    <input type="submit" name="Suprimer" value="Suprimer"/>
                </form>
            </article>
    </section>
     <section class="bak-section-class-article">
        
    </section>
</section>

        <?php
    }
}

?>
