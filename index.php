<?php 
    session_start();
    
    require_once 'helpers/Controleur.php';
    require_once 'helpers/Module.php';
    require_once 'functions/function.php';
    require_once 'Parametre.php';
    require_once 'helpers/Vue_generique.php';
    
    
    Parametre::init();
    
    if(isset($_GET["module"]) && !empty($_GET["module"])){
        $module = $_GET["module"];
    }  else {
        $module = "home"; 
    }
    
    
    
  
  
      switch ($module) {
          case "home":
                require_once Parametre::$MVC_BASE.'/modules/mod_home/Mode_Home.php';
              require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_news/Mini_mod_news.php';
              require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_connexion/Mini_mod_connection.php';
              require_once Parametre::$MVC_BASE.'/mini_modules/mod_article/Mini_mod_article.php';
                $module = new Mode_Home();
                $mini_mod = new Mini_mod_news();
                $mini_mod_1 = new Mini_mod_article();
                //$mini_mod_2 = new Mini_mod_connection();
                
               
              break;
          case "articles":
              require_once Parametre::$MVC_BASE."/modules/mod_articles/Mode_articles.php";
              require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_connexion/Mini_mod_connection.php';
              $module = new Mode_articles();
              //$mini_mod_2 = new Mini_mod_connection();
                
               
              break;
          case "inscription":
              require_once Parametre::$MVC_BASE."/mini_modules/mod_inscription/Mod_inscription.php";
              
              $module = new Mod_inscription();
             
               
              break;
          
          case "news":
              require_once Parametre::$MVC_BASE."/modules/mod_news/Mod_news.php";
              
              $module = new Mod_news();
             
               
              break;
           case "contact":
             
             require_once Parametre::$MVC_BASE.'/modules/Mode_Contact/Mode_Contact.php';
             
                $module = new Mode_Contact();
          
              break;
          default:
              require_once Parametre::$MVC_BASE.'/modules/mod_home/Mode_Home.php';
              require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_news/Mini_mod_news.php';
              require_once Parametre::$MVC_BASE.'/mini_modules/mod_article/Mini_mod_article.php';
              require_once Parametre::$MVC_BASE.'/mini_modules/mini_mod_connexion/Mini_mod_connection.php';
              $module = new Mode_Home();
              $mini_mod = new Mini_mod_news();
              $mini_mod_1 = new Mini_mod_article();
              //$mini_mod_2 = new Mini_mod_connection();
             
              break;
      }
      
      
    ?>

    <!DOCTYPE html>
            <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <meta name="robots" content="index,follow"/>
                    <meta name="description" content="<?php if(isset($module)) echo $module->getControl()->getDescription();?>"/>
                    <meta name="keywords" content="<?php if(isset($module)) echo $module->getControl()->getkeywords();?>"/>
                    <title><?php if(isset($module)) echo $module->getControl()->getTitre();?></title>
                    
                </head>
                <body>
                    
  <?php 
       require_once 'Header.php';
       $header = new header();
       //$header->header();
      
       //HOME
       if(isset($mini_mod_2))echo $mini_mod_2->display ();
       if(isset($module))echo $module->display();
       if(isset($mini_mod))echo $mini_mod->display ();
       if(isset($mini_mod_1))echo $mini_mod_1->display ();
       
      require_once 'Footer.php';
      $footer = new Footer();
      //$footer->footer();
      
      
      
  