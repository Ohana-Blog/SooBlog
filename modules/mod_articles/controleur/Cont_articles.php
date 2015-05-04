<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cont_articles
 *
 * @author bbpomme
 */
class Cont_articles extends Controleur{
    //put your code here
    function __construct() {
        require_once Parametre::$MVC_BASE.'/modules/mod_articles/model/Dao_articles.php';
        require_once Parametre::$MVC_BASE.'/modules/mod_articles/model/Dao_commentaire.php';
        require_once Parametre::$MVC_BASE.'/modules/mod_articles/vue/Vue_articles.php';
        require_once Parametre::$MVC_BASE.'/entities/Article.php';
        require_once Parametre::$MVC_BASE.'/entities/Commentaire.php';
        require_once Parametre::$MVC_BASE.'/entities/Jeton.php';
        require_once Parametre::$MVC_BASE.'/helpers/Vue_generique.php';
        require_once Parametre::$MVC_BASE.'/helpers/Daojeton.php';
        
    }

    public function afficher_tout_les_articles() {
        $this->titre="Liste des articles";
        $this->description="";
        $this->keywords="";
        
 
        $manage_articles = new Dao_articles();
        
        try {
                $nbr_article = $manage_articles->nbr_page();
                if(isset($_GET["p"]))
                {
                    $get_page = $_GET["p"];
                }
                else
                {
                    $get_page = 1;
                }

            // nombre de page fonction ceil pour arrondire page supérieur
             $nbr_page =  ceil($nbr_article/10);
            
            
             
            $donnees = $manage_articles->afficher_pagination(10, $get_page);
            
            $this->vue= new Vue_articles();
            $this->method_vue="tout_les_articles";
            $this->parametre=array("article"=>$donnees,"nbr_page"=>$nbr_page);
            
            
            
        } catch (Dao_Article_Expetion $e) {
            $this->vue = new Vue_articles();
            $this->method_vue ="Error_message";
            $this->parametre=$e->getMessage();
        }
     }
     
     public function afficher_article_id(){
         $this->titre="Article";
         $this->description="";
         $this->keywords="";
         
         $manager_article = new Dao_articles();
         $manage_com = new Dao_commentaire();
         
         try {
             
                if(isset($_GET["id_article"])){
                    $donnees= array();
//                    $donnees["article"] = $manage_article->select_last_article();

                    $donnees["commentaire"] = $manage_com->select_coms_fk_art($_GET["id_article"]); 
                    
                    
                    $donnees["article"] = $manager_article->select_articles_id($_GET["id_article"]);
                   
                    $jeton = new Jeton(30);
                    
                    $manageJeton = new DaoJeton();
                    $manageJeton->insert_jeton($jeton);
                    $manageJeton->select_jeton_valid($jeton->getString());
                    if($jeton->getString() != NULL)
                    {
                      
                    
                        $donnees["jeton"] = $jeton;

                        $this->vue= new Vue_articles();
                        $this->method_vue="un_article";
                        $this->parametre = $donnees;
                    }
                   

                }
             
         } catch (Dao_articles_Exeption $e) {
             $this->vue=new Vue_articles();
             $this->method_vue="Error_message";
             $this->parametre=$e->getMessage();
         }
            catch (Dao_commentaire_Exeption $e){
                    $this->vue=new Vue_articles();
                        $this->method_vue="Error_message";
                        $this->parametre=$e->getMessage();
                    }
             
    }
    
    public function action_enr_com() {
        if(isset($_POST["id_article"]) && is_numeric($_POST["id_article"])){
            if(isset($_POST["pseudo"]) && isset($_POST["commentaire"]) && isset($_POST["jeton"]) && isset($_POST["mail"])){
                if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
                    $pseudo = htmlspecialchars($_POST["pseudo"]);
                    $commentaire = htmlspecialchars($_POST["commentaire"]);
                    
                    $com = new Commentaire(array("pseudo"=>$pseudo,"commentaire"=>$commentaire,"mail"=>$_POST["mail"],"fk_id_art"=>$_POST["id_article"],"ip"=>$_SERVER['REMOTE_ADDR']));
                    var_dump($com);
                    if($com->getFk_id_art() != ""){
                        
                        $manageJeton = new DaoJeton();
                        $jeton = $manageJeton->select_jeton_valid($_POST["jeton"]);
                        
                        if(is_object($jeton)){
                            $manageCom = new Dao_commentaire();
                            $manageCom->insert_com($com);
                            ?>
                                         <script>
                                            window.setTimeout(function(){
                                                window.location="index.php?module=articles&action=article&id_article=<?php echo $_POST["id_article"]?>";
                                            },1000);
                                        </script>
                           <?php
                        }



                    }
                }
            }
            
            
        }
        $this->afficher_article_id();
    }
}

?>
