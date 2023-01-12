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
                require_once "view/admin.user.view.php";
               
            }

            public function displayProfilUser() {
                $users = $this->userManager->getUsers();
                require_once "view/profil.user.view.php";
            }
               
            


// -------------------------------------------------------------------------------------------------------------------------------------

                // ----- FUNCTION CONNECT LOGIN -----

            public function connectUserValidation(){
                $user = $this->userManager->getUserByEmail($_POST['email'], $_POST['MdP']);
                $errors = array();


                if (!empty($_POST['email']) && !empty($_POST['MdP']) ){
                    
                    $_SESSION['id'] = $user->getId();
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
                    
                }
                elseif(empty($_POST['email']) || empty($_POST['MdP'])){
                    $errors['email'] = "Veuillez entrer une adresse email ou un mot de passe ";
                    ?>
                                <script type="text/javascript">
                                    alert('<?= $errors['email'] ?>');
                                    location.href = "<?=URL?>login";
                                </script>
                    <?php
                }
                elseif(!empty($_POST['email'] != $email) || !empty($_POST['MdP'] != $MdP)){
                    $errors['email'] = "Votre adresse email ou votre mot de passe est incorrect";
                    ?>
                                <script type="text/javascript">
                                    alert('<?= $errors['email'] ?>');
                                    location.href = "<?=URL?>login";
                                </script>
                    <?php
                }
            }
                
        // -------------------------------------------------------------------------------------------------------------------------------------

                // ----- FUNCTION LOGOUT -----

            public function logoutValidation() { 
                session_start();
                session_destroy();
                ?>
                            <script type="text/javascript">
                                alert('Vous etes deconnecté(e)');
                                location.href = "<?=URL?>accueil";
                            </script>
                <?php
            }


// -------------------------------------------------------------------------------------------------------------------------------------

                //----- VALIDATION DU FORM -----

            public function newUserValidation() {  
                $this->userManager->newUserDB( $_POST['email'], $_POST['username'], $_POST['MdP'],$_POST['role']); 
                $errors = array();

                if(empty($_POST['email'])){
                    $errors['empty'] = "Veuillez entrer une adresse email";
                    ?>
                                <script type="text/javascript">
                                    alert('<?= $errors['empty'] ?>');
                                    location.href = "<?=URL?>inscription";
                                </script>
                            <?php 
                }
                elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors ['email'] = "Votre adresse email n'est pas valide";
                    ?>
                            <script type="text/javascript">
                                alert('<?= $errors['email'] ?>');
                                location.href = "<?=URL?>inscription";
                            </script>
                    <?php 
                }
    
                elseif(empty($_POST['username'])){
                    $errors['email'] = "Veuillez entrer un pseudo";
                        ?>
                            <script type="text/javascript">
                                alert('<?= $errors['email'] ?>');
                                location.href = "<?=URL?>inscription";
                            </script>
                        <?php 
                }
    
                elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
                    $errors ['username'] = "Votre pseudo n'est pas valide";
                    ?>
                            <script type="text/javascript">
                                alert('<?= $errors['username'] ?>');
                                location.href = "<?=URL?>inscription";
                            </script>
                    <?php
                }
    
                elseif (empty($_POST['MdP']) ){
                    $errors['mdp'] = "Veuillez entrer un mot de passe";
                    ?>
                            <script type="text/javascript">
                                alert('<?= $errors['mdp'] ?>');
                                location.href = "<?=URL?>inscription";
                            </script>      
                    <?php
                    }  
            }

                // -------------------------------------------------------------------------------------------------------------------------------------

                //----- FORM  -----

            public function editUserForm($id) { 
                $user = $this->userManager->getUserById($id);
                require_once "view/edit.user.view.php";
            }

            public function editProfilForm($id) { 
                $user = $this->userManager->getUserById($id);
                require_once "view/edit.profil.view.php";
            }

                // -------------------------------------------------------------------------------------------------------------------------------------

                // ----- AFFICHAGE DES USERS -----

// -------------------------------------------------------------------------------------------------------------------------------------

                // ----- VALIDATION DU FORM EDIT  -----

public function editUserValidation() {  
    $this->userManager->editUserDB($_POST['id'],  $_POST['email'], $_POST['username'], $_POST['MdP']);
    
    ?>
    <script type="text/javascript">
        alert('Votre profil a bien été modifié');
        location.href = "<?=URL?>useradmin";
    </script>
    <?php
}
   // ------------------------------------------------------------------------------------------------------------------------------------- 

                // ----- SUPPRESSION -----

 public function deleteUser($id) {  
     $this->userManager->deleteUserDB($id);
     header('Location: '. URL ."useradmin");
}
     
}

?>