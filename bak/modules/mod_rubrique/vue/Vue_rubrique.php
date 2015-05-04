<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_rubrique
 *
 * @author bbpomme
 */
class Vue_rubrique {
    //put your code here
    public function rubrique_gestion($donnees){
        
     ?>
<section id="bak-section-id-rubrique">
     <h1>Module Rubrique</h1>
            <form action="index.php?module=rubrique&action=creation_form" method="post">
                <table border="1"> 
                    <tr>
                        <td><a href="../index.php" target="_blank" >Site</a></td><td><?php echo $_SESSION["statut"]; ?></td><td><input type="submit" name="creer" value="Créer une news"/></td>
                    </tr>
                </table>
            </form>
     <table border="1">
         <form method="post" action="index.php?module=rubrique&action=suprimer">
         <tr>
            <th></th><th>#</th><th>Rubrique</th><th>ID</th>
         </tr>
         <?php 
         $n=0;
              foreach ($donnees as $value) {
                  
         ?>
         <tr>
             <td><?php echo $n++;?></td><td><input type="checkbox" name="id_r" value="<?php echo $value->getId_r();?>"/></td><td><a href="index.php?module=rubrique&action=modification&id_r=<?php echo $value->getId_r();?>"><?php echo $value->getRubrique(); ?></a></td><td><?php echo $value->getId_r();?></td>
         </tr>
         
         <?php
              }
         
         ?>
         <tr>
             <td colspan="4"><input type="submit" name="effacer" value="Suprimer"/></td>
         </tr>
         
         </form>
     </table>
     
</section>

     <?php
        
    }
    
    public function rubrique_modif($donnees) {
 
        $jeton = $donnees["jeton"];
        $rubrique = $donnees["rubrique"];
        ?>
<section id="bak-section-id-rubrique">
    <h1>Module Rubrique</h1>
    <h2>Modifer rubrique</h2>
    <a href="index.php?module=rubrique&action=gestion"><input type="button" value="<"/></a>
    <form action="index.php?module=rubrique&action=modifier" method="post">
        <input type="hidden" name="jeton" value="<?php if(isset($jeton)) echo $jeton;?>"/>
        <input type="hidden" name="id_r" value="<?php echo $rubrique->getId_r();?>"/>
        <p>ID : <?php echo $rubrique->getId_r(); ?></p>
        <p>Rubrique : <?php  echo $rubrique->getRubrique();?></p>
        <p>Nouvelle appelation : <input type="text" name="rubrique" /></p>
        <p><input type="submit" name="modifier" value="Modifier la rubrique"/></p>
    </form>
</section>

        <?php
    }
    
    public function aff_creation($donnees){
        $jeton = $donnees["jeton"];
        ?>
            <h1>Module Rubrique</h1>
            <h2>Créer rubrique</h2>
            <a href="index.php?module=rubrique&action=gestion"><input type="button" value="<"/></a>
            <form action="index.php?module=rubrique&action=creation" method="post">
                <input type="hidden" name="jeton" value="<?php if(isset($jeton)) echo $jeton;?>"/>
                <p>Rubrique : <input type="text" name="rubrique"/></p>
                <p><input type="submit" name="creer" value="Créer la rubrique"/></p>
            </form>

        <?php
    }
}

?>
