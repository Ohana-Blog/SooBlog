<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_ref
 *
 * @author bbpomme
 */
class Vue_ref {
    //put your code here
    
    public function form_gestion($donnees) {
        $page = $donnees["ref"];
        ?>

<section id="ref-section-id-select">
    <h1>Référencement</h1>
    <h2>Liste des pages</h2>
    
    <form action="index.php?module=referencement&action=creation_form" method="post">
                <table border="1"> 
                    <tr>
                        <td><a href="../index.php" target="_blank" >Site</a></td><td><?php echo $_SESSION["statut"]; ?></td><td><input type="submit" name="creer" value="Créer un un page de ref"/></td>
                    </tr>
                </table>
    </form>
    
    <table border="1">
       <form action="index.php?module=referencement&action=selection" method="post">
           <tr>
               <th></th><th>#</th><th>Table</th><th>Titre</th><th>Description</th><th>Mots clefs</th><th>ID</th>
           </tr>
           <?php 
           $i=0;
                   foreach ($page as $value) {
                       ?>
           
           <tr>
               <td><input type="checkbox" name="id_page[]" value ="<?php echo $value->getId_page(); ?>"</td><td><?php echo $i++; ?></td><td><?php echo $value->getNom_table();?></td><td><a href="index.php?module=referencement&action=modification&id_page=<?php echo $value->getId_page();?>"><?php echo $value->getTitre_p(); ?></a></td><td><?php echo $value->getDescription_p();?></td><td><?php echo $value->getMot_clefs(); ?></td><td><?php echo $value->getId_page();?></td>
           </tr>
           
                       <?php
                   }
           
           ?>
           <tr>
               <td colspan="7"> <input type="submit" name="suprimer" value="Suprimer"/></td>
<!--               suprimer un article ou une news suprime aussi le referencement utiliser uniquemen pour page accueil contact...-->
           </tr>
       
    </form>
    </table>
    
    
    
</section>

        <?php
    }
    
    public function form_modif($donnees) {
        $page = $donnees["ref"];
        $jeton = $donnees["jeton"];
     ?>   
        <section id="ref-section-id-update">
            <h1>Référencement</h1>
            <h2>Paramétrer : </h2>
            <a href="index.php?module=referencement"><input type="button" value="<"/></a>
            <form action="index.php?module=referencement&action=update" method="post">
                 <input type="hidden" name="jeton" value="<?php if(isset($jeton)) echo $jeton;?>"/>
                <input type="hidden" name="id_page" value="<?php if(isset($page) && $page !="") echo $page->getId_page();?>"/>
                <p> Titre : <input type="text" name="titre_p" value="<?php if(isset($page) && $page !="") echo $page->getTitre_p();?>"/></p>

                <p> Description : <textarea name="description_p"><?php if(isset($page) && $page !="") echo $page->getDescription_p();?></textarea></p>

                <p> Mot clef : <textarea name="mot_clefs"><?php if(isset($page) && $page !="") echo $page->getMot_clefs();?></textarea></p>

                <input type="submit" name="update" value="Paraméter référencement"/>
            </form>
    
        </section>
    <?    
    }


























    public function form_ref($titre){

        ?>
<section id="ref-section-id-select">
    <h2>Liste des pages</h2>
    
    <form action="index.php?module=referencement&action=selection" method="post">
        
        <p> Page à paramétrer :
            <select name="id_page">
             <?php
                    for($i=0;$i<count($titre["titre"]);$i++){
                        echo"<option value=".$titre["titre"][$i]->getId_page().">".$titre["titre"][$i]->getTitre_p()."</option>";
                    }
                     
             ?>
             </select>
       </p>
        
        <br/> 
        <br/> 
        <input type="submit" name="select" value="Selectionner"/>
    </form>
    
</section>


<section id="ref-section-id-update">
    <h2>Paramétrer : </h2>
    
    <form action="index.php?module=referencement&action=update" method="post">
        <input type="hidden" name="id_page" value="<?php if(isset($titre["ref"]) && $titre["ref"] !="") echo $titre["ref"]->getId_page();?>"/>
        <p> Titre : <input type="text" name="titre_p" value="<?php ;?>"/></p>
        
        <p> Description : <textarea name="description_p"><?php ;?></textarea></p>
        
        <p> Mot clef : <textarea name="mot_clef"><?php ;?></textarea></p>
        
        <br/> 
        <br/> 
        <input type="submit" name="update" value="Paraméter référencement"/>
    </form>
    
</section>


<section id="ref-section-id-delete">
    <h2>suprimer réferencement</h2>
    
    <form action="index.php?module=referencement&action=delete" method="post">
        
        <p> Page à suprimer :
            <select name=id_page">
              <?php
                    for($i=0;$i<count($titre["titre"]);$i++){
                        echo"<option value=".$titre["titre"][$i]->getId_page().">".$titre["titre"][$i]->getTitre_p()."</option>";
                    }
                     
             ?>
             </select>
       </p>
        
        <br/> 
        <br/> 
        <input type="submit" name="delete" value="Supression du referencement"/>
    </form>
    
</section>
            
        <?php
    }
}

?>
