<?php

define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
"://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

require_once "controller/UserController.php";
$userController = new UserController;

require_once "controller/LoginController.php";
$LoginController = new LoginController;

require_once "controller/FigurineController.php";
$FigurineController = new FigurineController;










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

             elseif ($url[1] === "connexion") {
                $LoginController->loginValidation();
            }

            elseif ($url[1] === "logout") {
                $LoginController->logoutValidation();
            }
            break;


     
            // ********************************************************************************************************************
     // *************************** INSCRIPTION ************************************************************************
     // ******************************************************************************************************************** 
            
            case 'inscription': 
            
                if(empty($url[1])){; 
                    $userController->NewUserForm(); // SI RIEN APRES GAMES ALORS PAGE GAMES
                } elseif ($url[1] === "validation") {
                    $userController->NewUserValidation();
                } 
            break;

        // ********************************************************************************************************************
        // *************************** ADMIN ************************************************************************
        // ********************************************************************************************************************

        case 'admin':
            if(empty($url[1])){; 
                require_once "view/admin.view.php"; // SI RIEN APRES GAMES ALORS PAGE GAMES
            } 
        break;


        case 'figurineadmin':
            if(empty($url[1])){; 
                $FigurineController->displayFigurineAdmin(); // SI RIEN APRES GAMES ALORS PAGE GAMES
            } 
            elseif ($url[1] === "add") {
                $FigurineController->NewFigurineForm();
            }
            elseif ($url[1] === "validation") {
                $FigurineController->NewFigurineValidation();
            }
            elseif ($url[1] === "edit") {
                $FigurineController->editFigurineForm($url[2]);
            }
            elseif ($url[1] === "editvalid") {
                $FigurineController->editFigurineValidation();
            }
            elseif ($url[1] === "delete") {
                $FigurineController->deleteFigurine($url[2]);
            }
        break;

            case 'useradmin' :
                if(empty($url[1])){; 
                    $userController->displayUserAdmin(); // SI RIEN APRES GAMES ALORS PAGE GAMES
                } 
                elseif ($url[1] === "add") {
                    $userController->NewUserForm();
                }
                elseif ($url[1] === "validation") {
                    $userController->NewUserValidation();
                }
                elseif ($url[1] === "edit") {
                    $userController->editUserForm($url[2]);
                }
                elseif ($url[1] === "editvalidation") {
                    $userController->editUserValidation();
                }
                elseif ($url[1] === "delete") {
                    $userController->deleteUser($url[2]);
                }
            break;

            case 'dragonball' :
                if(empty($url[1])){; 
                    $FigurineController->displayFigurineDragonBall(); 
                }
            break;

            case 'onepiece' :
                if(empty($url[1])){; 
                    $FigurineController->displayFigurineOnePiece();
                }
            break;

            case 'naruto' :
                if(empty($url[1])){; 
                    $FigurineController->displayFigurineNaruto();
                }
  
      


    }

 

  

    }
