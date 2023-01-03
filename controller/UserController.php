<?php 

require_once "modele/UserManager.php";  

class UserController {
    private $userManager;


                // ----- LORSQUE CONSTUCT (METHOD MAGIC) EST DECLENCHE, ON CHARGE LA BDD ET CREER UN OBJET DE LA CLASS UserManager -----
                
    public function __construct() {
        $this->userManager = new UserManager;
        $this->userManager->loadUser(); // ---- CHARGE LA BDD (loadGame dans userManager)
    }

// -------------------------------------------------------------------------------------------------------------------------------------

                // ----- FUNCTION DISPLAY -----


            public function displayLogin(){
                require_once "view/login.view.php";
            }
            

            public function newUserForm() { 
                require_once "view/inscription.view.php";
            }

            public function displayUserAdmin() {
                $users = $this->userManager->getUsers();
                require_once "view/user.admin.view.php";
            }

// -------------------------------------------------------------------------------------------------------------------------------------

                //----- VALIDATION DU FORM -----

            public function newUserValidation() {  
                // var_dump($_POST);
                $this->userManager->newUserDB( $_POST['email'], $_POST['username'], $_POST['MdP']);  
               
            }

                // -------------------------------------------------------------------------------------------------------------------------------------

                //----- FORM  -----

public function editUserForm($id) {  
    $user = $this->userManager->getUserById($id);
     require_once "view/edit.users.view.php";
}

// -------------------------------------------------------------------------------------------------------------------------------------

                // ----- VALIDATION DU FORM EDIT  -----

public function editUserValidation() {  
    $this->userManager->editUserDB($_POST['id'],  $_POST['email'], $_POST['username'], $_POST['MdP']);
    header('Location: '. URL ."useradmin");
}

   // ------------------------------------------------------------------------------------------------------------------------------------- 

                // ----- SUPPRESSION -----

 public function deleteUser($id) {  
     $this->userManager->deleteUserDB($id);
     header('Location: '. URL ."useradmin");
}
     
}

?>