<?php
session_start();
var_dump($_SESSION);

    require_once '../helpers/Controleur.php';
    require_once '../helpers/Module.php';
    require_once '../functions/function.php';
    require_once '../Parametre.php';
    
    
    Parametre::init();
    
    if(isset($_GET["module"]) && !empty($_GET["module"])){
        $module = $_GET["module"];
    }  else {
        $module = "bak"; 
    }
    
    
    
  
  
      switch ($module) {

          case "se_connecter":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_accueil/Mod_accueil.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              
              $moduleConnection = new Mod_connection();
              
              $module = new Mod_accueil();
              
              $modulenav = new Mod_nav();
               
              break;
          
          case "article":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              require_once Parametre::$MVC_BASE.'/bak/modules/module_article/Mod_article.php';
              $moduleConnection = new Mod_connection();          
              
              $module = new Mod_article();
              
              $modulenav = new Mod_nav();
               
              break;
          case "referencement":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              require_once Parametre::$MVC_BASE.'/bak/modules/module_referencement/Mod_referencement.php';
              $moduleConnection = new Mod_connection();          
              
              $module = new Mod_referencement();

              
              $modulenav = new Mod_nav();
               
              break;
          case "news":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              require_once Parametre::$MVC_BASE.'/bak/modules/module_news/Mod_news.php';
              $moduleConnection = new Mod_connection();          
              
              $module = new Mod_news();

              
              $modulenav = new Mod_nav();
               
              break;
           case "commentaire":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_commentaire/Mod_commentaire.php';
              
              $moduleConnection = new Mod_connection();          
              
              $module = new Mod_commentaire();

              
              $modulenav = new Mod_nav();
               
              break;
          case "jeton":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_jeton/Mod_jeton.php';
              
              $moduleConnection = new Mod_connection();          
              
              $module = new Mod_jeton();

              
              $modulenav = new Mod_nav();
               
              break;
          case "rubrique":
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_rubrique/Mod_rubrique.php';
              
              $moduleConnection = new Mod_connection();          
              
              $module = new Mod_rubrique();

              
              $modulenav = new Mod_nav();
               
              break;
          
//          case "admin":
//              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
//              require_once Parametre::$MVC_BASE.'/bak/module/module_accueil/Mod_accueil.php';
//              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
//              
//              $moduleConnection = new Mod_connection();
//              
//              $module = new Mod_accueil();
//              
//              $modulenav = new Mod_nav();
//               
//              break;

          default:
              require_once Parametre::$MVC_BASE.'/bak/modules/mod_connection/Mod_connection.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_accueil/Mod_accueil.php';
              require_once Parametre::$MVC_BASE.'/bak/module/module_nav/Mod_nav.php';
              
              $module = new Mod_accueil();
              
              $moduleConnection = new Mod_connection();
              
              //$modulenav = new Mod_nav();

             
              break;
      }
      
      
    ?>

    <!DOCTYPE html>
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="robots" content="index,follow"/>
                    <meta name="description" content=""/>
                    <meta name="keywords" content=""/>
                    <title><?php if(isset($module)) echo $module->getControl()->getTitre();?></title
                    
                </head>
                <body>
                    
  <?php 
       if(isset($modulenav))echo $modulenav->display();
       //$header->header();
      
       //HOME
       if(isset($moduleConnection))echo $moduleConnection->display();
       if(isset($module))echo $module->display();
       

      require_once '../Footer.php';
      $footer = new Footer();
      //$footer->footer();
?>
