<?php 

require_once "modele/LoginManager.php";  

class LoginController {
    private $loginManager;


                // ----- LORSQUE CONSTUCT (METHOD MAGIC) EST DECLENCHE, ON CHARGE LA BDD ET CREER UN OBJET  -----
                
    public function __construct() {
        $this->loginManager = new LoginManager;
        $this->loginManager->loadUser(); // ---- CHARGE LA BDD 
    }

// ------------------------------------------ fonction display login -------------------------------------------------------------------------------------------


                // ----- FUNCTION DISPLAYGAMES RECUPERE LES JEUX DE LA BDD (getName dans gameManager) -----

    public function displayLogin() {
        $logins = $this->loginManager->getUsers(); 
        require_once "view/login.view.php";
        
    }
 
// ------------------------------------------ fonction validation login   ---------------------------------------------------------------------------------------


    public function loginValidation() { 
        $logins = $this->loginManager->loginControl(); 
        

    }

    public function logoutValidation() { 
        
        $logins = $this->loginManager->logoutControl();
       
        

    }



}
?>