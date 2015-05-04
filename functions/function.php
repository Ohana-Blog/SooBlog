<?php
//creer_image_exact(100, 100, $taille_actuelle, $url_nom_fichier, $file);//reccupérertaille de l'image dans la fonction
function uploadedImg($img,$chemin){
    if($img["size"]<= 55574528 )// test la taille du fichier
   
          //recupération de l'extension du fichier
          $infosfichier = pathinfo($img["name"]);//on recupere un tableau (nom, tail, extension,ect)
      
          $extension_telecharge = $infosfichier["extension"];//on recupère l'extension du fichier
          
          $extension_autorisees = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG');
          if(in_array($extension_telecharge,$extension_autorisees))
          {             
                move_uploaded_file($img["tmp_name"],Parametre::$MVC_BASE.$chemin.basename($img["name"]));
                return TRUE;
          }  else {
              return "EXTENSION NON AUTORISEE";
          }
}
  
   

function envoi_mail_simple($Notre_mail,$client_mail,$site,$objet,$message,$nom) {

    $msg="";
    $feedback = $message." \n Nom : ".$nom." \n Objet : ".$objet;
    
    $headers = "From: \"".$site."\"<".$client_mail.">\n";
    $headers .= "Reply-To: ".$Notre_mail."\n";
    $headers .= "Content-Type: text/plain; charset=\"utf-8\"\n";
    if(mail($Notre_mail,$objet,$feedback,$headers))
    {
        $msg .= "<span style='color:green;'>L'email a bien été envoyé.</span>";
    }
    else
    {
        $msg .= "<span style='color:red;'>Une erreur c'est produite lors de l'envois de l'email.</span>";
    }
    
    return $msg; 
}

function creer_image_exact($largeur_max,$hauteur_max,$taille_actuelle,$url_nom_fichier,$file){
    
    $infosfichier = pathinfo($file["name"]);//on recupere un tableau (nom, tail, extension,ect)
    $extension_telecharge = $infosfichier["extension"];//on recupère l'extension du fichier
    $extension_autorisees =  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG');
    
    
    if(in_array($extension_telecharge, $extension_autorisees)){
            switch ($extension_telecharge) {
        
                case "jpg":
                    $image = imagecreatefromjpeg($file["name"]);// creation d'image depuis une jpeg

                    break;
                case "jpeg":
                    $image = imagecreatefromjpeg($file["name"]);// creation d'image depuis une jpeg

                    break;
                case "JPG":
                    $image = imagecreatefromjpeg($file["name"]);// creation d'image depuis une jpeg

                    break;
                case "JPEG":
                    $image = imagecreatefromjpeg($file["name"]);// creation d'image depuis une jpeg
                    
                    break;
                case "png":
                    $image = imagecreatefrompng($file)["name"];// creation d'image depuis une jpeg

                    break;
                case "PNG":
                    $image = imagecreatefrompng($file["name"]);// creation d'image depuis une jpeg
                    
                    break;
                case "gif":
                    $image = imagecreatefromgif($file["name"]);// creation d'image depuis une jpeg

                    break;
                case "GIF":
                    $image = imagecreatefromgif($file["name"]);// creation d'image depuis une jpeg
                    
                    break;

                default:
                    $error = "L'extension n'st pas autorisée...";
                    break;
            }
            
            $coef =  max($taille_actuelle[0]/$largeur_max,$taille_actuelle[1]/$hauteur_max,1);// renvoie la valeur la plus grande
            
            $new_img = imagecreatetruecolor($taille_actuelle[0], $taille_actuelle[1]);// la function génère une nouvelle image virtuelle en php ($width & $height)
            
            $couleur = imagecolorallocate($new_img, 0, 0, 0);//creéation de la couleur(noir) de l'image valeur de 0 a 255
            
            imagecopyresampled($new_img, $file, $taille_actuelle[0]-($taille_actuelle[0]/$coef)/2,$taille_actuelle[1]-($taille_actuelle[1]/$coef)/2, 0, 0, $taille_actuelle[0]/$coef,$taille_actuelle[1]/$coef, $taille_actuelle[0], $taille_actuelle[1]);
            //nouvelle image image qu'on copie coordonnée X,Y de la nouvelle image coordonnée X et Y de l image source ensuite on copie largeur et hauteur de destination(taille que va faire notre nouvelle image) puis largeur et hauteur de la source
            imagejpeg($new_img, $url_nom_fichier, 90);//on enregistre la nouvelle image en jpeg on met l 'url et la qualité de 0 a 100%
    }
    
    function creer_imageMax($largeur_max,$hauteur_max,$taille_actuelle,$url_nom_fichier,$file){
    
    $infosfichier = pathinfo($file["name"]);//on recupere un tableau (nom, tail, extension,ect)
    $extension_telecharge = $infosfichier["extension"];//on recupère l'extension du fichier
    $extension_autorisees =  array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG');
    
    
        if(in_array($extension_telecharge, $extension_autorisees)){
                switch ($extension_telecharge) {

                    case "jpg":
                        $image = imagecreatefromjpeg($file);// creation d'image depuis une jpeg

                        break;
                    case "jpeg":
                        $image = imagecreatefromjpeg($file);// creation d'image depuis une jpeg

                        break;
                    case "JPG":
                        $image = imagecreatefromjpeg($file);// creation d'image depuis une jpeg

                        break;
                    case "JPEG":
                        $image = imagecreatefromjpeg($file);// creation d'image depuis une jpeg

                        break;
                    case "png":
                        $image = imagecreatefrompng($file);// creation d'image depuis une jpeg

                        break;
                    case "PNG":
                        $image = imagecreatefrompng($file);// creation d'image depuis une jpeg

                        break;
                    case "gif":
                        $image = imagecreatefromgif($file);// creation d'image depuis une jpeg

                        break;
                    case "GIF":
                        $image = imagecreatefromgif($file);// creation d'image depuis une jpeg

                        break;

                    default:
                        $error = "L'extension n'st pas autorisée...";
                        break;
                }

                $coef =  max($taille_actuelle[0]/$largeur_max,$taille_actuelle[1]/$hauteur_max,1);// renvoie la valeur la plus grande

                $new_img = imagecreatetruecolor($taille_actuelle[0]/$coef, $taille_actuelle[1]/$coef);// la function génère une nouvelle image virtuelle en php ($width & $height)

                $couleur = imagecolorallocate($new_img, 0, 0, 0);//creéation de la couleur(noir) de l'image 

                imagecopyresampled($new_img, $file, 0, 0, 0, 0, $taille_actuelle[0]/$coef,$taille_actuelle[1]/$coef, $taille_actuelle[0], $taille_actuelle[1]);
                //nouvelle image image qu'on copie coordonnée X,Y de la nouvelle image coordonnée X et Y de l image source ensuite on copie largeur et hauteur de destination(taille que va faire notre nouvelle image) puis largeur et hauteur de la source
                imagejpeg($new_img, $url_nom_fichier, 90);//on enregistre la nouvelle image en jpeg on met l 'url et la qualité de 0 a 100%
        }
    
    }

    
    
    
    
    
    
}

