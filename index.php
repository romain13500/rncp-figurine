<?php

define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
"://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));






if(empty($_GET['page'])){
    require_once "view/home.view.php";
} else {
    // FILTRE L'URL (SECURITE"), enleve les caracteres speciaux
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL)); 
   
    switch($url[0]){
        case 'accueil':
                require_once "view/home.view.php";
            break;
        }
    }
