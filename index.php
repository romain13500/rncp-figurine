<?php

define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
"://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

require_once "controller/UserController.php";
$userController = new UserController;

require_once "controller/LoginController.php";
$LoginController = new LoginController;










if(empty($_GET['page'])){
    require_once "view/home.view.php";
} else {
    // FILTRE L'URL (SECURITE"), enleve les caracteres speciaux
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL)); 
   
    switch($url[0]){
        case 'accueil':
                require_once "view/home.view.php";
            break;
     // ********************************************************************************************************************
     // *************************** LOGIN ET LOGOUT ************************************************************************
     // ******************************************************************************************************************** 


        case 'login':

            if (empty($url[1])){
                $LoginController->displayLogin(); 
             }

            //  elseif ($url[1] === "connexion") {
            //     $LoginController->loginValidation();
            // }

            // elseif ($url[1] === "logout") {
            //     $LoginController->logoutValidation();
            // }
            break;






     // ********************************************************************************************************************
     // *************************** LOGIN ET LOGOUT ************************************************************************
     // ******************************************************************************************************************** 
            
            
            
            
            
            
            case 'inscription': 
            
                if(empty($url[1])){; 
                    $userController->NewUserForm(); // SI RIEN APRES GAMES ALORS PAGE GAMES
                } elseif ($url[1] === "validation") {
                    $userController->NewUserValidation();
                } 
                break;
  
      


    }

 

  

    }
