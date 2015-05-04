<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_new
 *
 * @author bbpomme
 */
class Vue_news {
    //put your code here
    
    
    
    public function aff_getion_articles($donnees){
        $news = $donnees["news"];
        
        $rubrique = $donnees["rubrique"];
        
        
    ?> 
        <section id="section-news-id-select">
            <h1>Module news</h1>
            <form action="index.php?module=news&action=creation_form" method="post">
                <table border="1"> 
                    <tr>
                        <td><a href="../index.php" target="_blank" >Site</a></td><td><?php echo $_SESSION["statut"]; ?></td><td><input type="submit" name="creer" value="Créer une news"/></td>
                    </tr>
                </table>
            </form>
            
    <form action="index.php?module=news&action=selection" method="post">
        <table border="1">
            
            <tr>
                <th></th><th>#</th><th>TITRE</th><th>DATE</th><th>ID</th><th>Rubrique</th>
            </tr>
            <?php   
            $j="";
            for($i=0;$i<COUNT($news);$i++) {
                ?>
        
        <tr>
            <td>
                <?php echo $j++?>
            </td>
            <td>
                <input type="checkbox" name="id_n[]" value="<?php if(isset($news))echo $news[$i]->getId_n();?>"/>
            </td>
            <td>
                <a href="index.php?module=news&action=modifier&id_n=<?php if(isset($news))echo $news[$i]->getId_n();?>"> <?php if(isset($news))echo $news[$i]->getTitre_n();?></a>
            </td>
            <td>
                <?php if(isset($news))echo $news[$i]->getDate_n();?>
            </td>
            <td>
                <?php if(isset($news))echo $news[$i]->getId_n();?>
            </td>
            <td>
                <?php if(isset($news))echo $rubrique[$i]->getRubrique();?>
            </td>
        </tr>
        
                <?php
            }
                    
            ?>
        </table>
           
        
        <input type="submit" name="suprimer" value="Suprimer"/>
    </form>
</section>
<?php      
}

    public function ajout_article($donnees){
        $jeton = $donnees["jeton"];
        $rubriques = $donnees["rubrique"];
        
    ?>
        <section id="section-news-id-insert">
            <h1>Modules news</h1>
            <h2>Créer une nouvelle news</h2>
            <a href="index.php?module=news&action=gestion"><input type="button" value="<"/></a>
            <form action="index.php?module=news&action=insertion" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="jeton" value="<?php if(isset($jeton)) echo $jeton;?>"/>
                <p> titre : <input type="text" name="titre_n"/></p>
                <p> News : <textarea name="news"></textarea></p>
                <p> Photo : <input type="file" name="photo_n" /></p>
                <p> Title : <input type="text" name="title_n" /></p>
                <p> Alt : <input type="text" name="alt_n" /></p>
                <p>
                    <select name="fk_id_r">
                        <option value ="">CHOISIR</option>
                        <?php 
                            foreach ($rubriques as $rubrique) {
                         ?>
                            <option value ="<?php echo $rubrique->getId_r(); ?>"><?php echo $rubrique->getRubrique();?></option>
                            
                        <?php
                            }
                        
                        ?>
                    </select>
                </p>
                <input type="submit" name="insertion" value="créer"/>
            </form>
        </section>
   <?php

        
    }

    public function modifier_article($donnees){
        $jeton = $donnees["jeton"];
        $rubriques = $donnees["rubrique"];
    ?>
<section id="section-news-id-modifier">
    <h1>Module news</h1>
    <h2>Modifier</h2>
    <a href="index.php?module=news&action=gestion"><input type="button" value="<"/></a>
    <form action="index.php?module=news&action=act_modif" method="post" enctype="multipart/form-data">
        <input type="hidden" name="jeton" value="<?php if(isset($jeton)) echo $jeton;?>"/>
        <input type="hidden" name="id_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getId_n();?>"/>
        <p> titre : <input type="text" name="titre_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getTitre_n();?>"/></p>
        <p> News : <textarea name="news"><?php if(isset( $donnees["news"]))echo $donnees["news"]->getNews();?></textarea></p>
        <p> Photo : <input type="file" name="photo_n" /></p>
        <p> Title : <input type="text" name="title_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getTitle_n();?>"/></p>
        <p> Alt : <input type="text" name="alt_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getAlt_n();?>"/></p>
        <p>
                    <select name="fk_id_r">
                        <option value ="">CHOISIR</option>
                        <?php 
                        $selected="";
                            foreach ($rubriques as $rubrique) {
                                if($donnees["news"]->getFk_id_r() == $rubrique->getId_r()){
                                    $selected ="SELECTED";
                                }  else {
                                   $selected=""; 
                                }
                                
                         ?>
                            <option value ="<?php echo $rubrique->getId_r(); ?>" <?php echo $selected; ?>><?php echo $rubrique->getRubrique();?></option>
                            
                        <?php
                            }
                        
                        ?>
                    </select>
                </p>
        <input type="submit" name="modifier" value="Modifier"/>
    </form>
</section>
        
        

    <?php
}





























































    public function forms_news($donnees) {
          var_dump($donnees);
        ?>

<section id="section-news-id-insert">
    <h2>Créer une nouvelle news</h2>
    <form action="index.php?module=news&action=insertion" method="post" enctype="multipart/form-data">
        <p> titre : <input type="text" name="titre_n"/></p>
        <p> News : <textarea name="news"></textarea></p>
        <p> Photo : <input type="file" name="photo_n" /></p>
        <p> Title : <input type="text" name="title_n" /></p>
        <p> Alt : <input type="text" name="alt_n" /></p>
        <input type="submit" name="creer" value="créer"/>
    </form>
</section>




<section id="section-news-id-insert">
    <h2>Modifier La news</h2>
    <?php 
    var_dump($donnees["news"]);
    ?>
    <form action="index.php?module=news&action=insertion" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getId_n();?>"/>
        <p> titre : <input type="text" name="titre_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getTitre_n();?>"/></p>
        <p> News : <textarea name="news"><?php if(isset( $donnees["news"]))echo $donnees["news"]->getNews();?></textarea></p>
        <p> Photo : <input type="file" name="photo_n" /></p>
        <p> Title : <input type="text" name="title_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getTitle_n();?>"/></p>
        <p> Alt : <input type="text" name="alt_n" value="<?php if(isset( $donnees["news"]))echo $donnees["news"]->getAlt_n();?>"/></p>
        <input type="submit" name="creer" value="créer"/>
    </form>
</section>
<section id="section-news-id-delete">
    <h2>Suprimer une news</h2>
    <form action="index.php?module=news&action=supression" method="post">
        <select name="id_n">
            <?php 
                for($i=0;$i<COUNT($donnees["liste"]);$i++){
                    if($donnees["liste"][$i]->getId_n() == $_POST["id_n"]){
                        $selected = "SELECTED";
                    }else{
                        $selected="";
                    }
            ?>
            <option value="<?php echo $donnees["liste"][$i]->getId_n();?>" <?php echo $selected;?>><?php echo $donnees["liste"][$i]->getTitre_n();?></option>
            <?php 
                }
            ?>
        </select><br/>
        <input type="submit" name="suprimer" value="Suprimer"/>
    </form>
</section>
 <?
    }
}


