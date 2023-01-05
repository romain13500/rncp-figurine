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

public function connectUserValidation(){
    $user = $this->loginManager->getUserByEmail($_POST['email'], $_POST['MdP']);

    $errors = array();

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)   ){
        $errors['empty'] = "Verifiez votre email";
        ?>
                <script type="text/javascript">
                    alert('<?= $errors['empty'] ?>');
                    location.href = "<?=URL?>login";
                 </script>
        <?php 
    }
    elseif(empty($_POST['username'])|| !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['email'] = "Verifiez votre pseudo";
        ?>
                    <script type="text/javascript">
                        alert('<?= $errors['email'] ?>');
                        location.href = "<?=URL?>login";
                    </script>
                <?php 
    }
   elseif (empty($_POST['MdP'])){
        $errors['MdP'] = "Verifiez votre mot de passe";
        ?>
                    <script type="text/javascript">
                        alert('<?= $errors['MdP'] ?>');
                        location.href = "<?=URL?>login";
                    </script>
        <?php
    } 
   
        session_start();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['MdP'] = $user->getMdP();
        $_SESSION['role'] = $user->getRole();
  
        ?>
                    <script type="text/javascript">
                        alert('Vous etes connecté(e)<?= $_SESSION['username'] ?>');
                        location.href = "<?=URL?>accueil";
                    </script>
        <?php

        header('Location: ' . URL . "accueil");

    
}
    

    public function logoutValidation() { 
        
        $logins = $this->loginManager->logoutControl();
       
    }

}

?>