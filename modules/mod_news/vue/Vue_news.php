<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_news
 *
 * @author bbpomme
 */
class Vue_news {
    //put your code here
    
    public function news($donnees) {
        $news = $donnees["news"];
        $page = $donnees["page"];
        $rubriques = $donnees["rubrique"];
        ?>

<section id="section-news-id">
    <h1>Toutes mes news</h1>
    
    <form action="index.php?module=news&action=affiner" method="post"/>
    <select name="id_r">
        <option>Rubrique</option>
        <?php 
            $selected="";
                foreach ($rubriques as $rubrique) {
                    if($_POST["id_r"] == $rubrique->getId_r()){
                        $selected="SELECTED";
                    }  else {
                      $selected="";  
                    }
        ?>        
        <option value="<?php echo $rubrique->getId_r(); ?>" <?php echo $selected; ?>><?php echo $rubrique->getRubrique(); ?> </option>   
       <?php             
                }       
        ?>
        
    </select>
    <input type="submit" name="rubrique"  value="RECHERCHER"/>
    </form>
    
    <?php 
            foreach ($news as $value) {
                
 
    ?>
    <article class="article-news-class">
        <h2><?php echo $value->getTitre_n();?></h2>
        <p><?php echo $value->getNews();?></p>
        <p><?php echo $value->getDate_n() ?></p>
        <div>
            <a href="index.php?module=news&action=news&id_n=<?php echo $value->getId_n(); ?>&p=<?php if(isset($_GET["p"])){ echo $_GET["p"];}else{echo "1";}?>"><img src="<?php echo Parametre::$MVC_BASE."/img/".$value->getPhoto_n();?>" title="<?php echo $value->getTitle_n();?>" alt="<?php echo $value->getAlt_n(); ?>"/></a>
        </div>
    </article>
        <?php 
            }
            
                if($value ==""){
                    ?>
                        <article>
                            <p>Bonjour pas d'article de trouvé concernant cette rubrique.</p>
                        </article>
                    <?php
                    
                }
            
            $nbr_page = "";
            
             for ($i=1;$i<=$page;$i++)
            {
            
                    
        ?>

                
               <section id='pagination'>
                   <a class='lien-pagination' href='index.php?module=news&action=une_news&p=<?php echo $i;?>'><?php echo $i;?></a>/
               </section>
                
   <?php
            }
            //echo $page;
   ?>
</section>

        <?php
    }
    public function une_news($donnees) {
        $value = $donnees["news"];
        ?>
<section id="section-une-news-id">
    
     <article id="article-news-id">
        <h2><?php echo $value->getTitre_n();?></h2>
        <p><?php echo $value->getNews();?></p>
        <p><?php echo $value->getDate_n() ?></p>
        <div>
            <a href="index.php?module=news&action=news&id_n=<?php echo $value->getId_n(); ?>"><img src="<?php echo Parametre::$MVC_BASE."/img/".$value->getPhoto_n();?>" title="<?php echo $value->getTitle_n();?>" alt="<?php echo $value->getAlt_n(); ?>"/></a>
        </div>
    </article>
    
</section>
        <?php
        
    }
}

?>
