<?php

require_once "modele/Manager.php";
require_once "modele/Users.php";


// ------ CREATION DE LA CLASS EXTEND DE MANAGER --------

class LoginManager extends Manager{
    private $users;

    public function addUser($user){
        $this->users[] = $user;
    }
    public function getUsers(){
        return $this->users;
    }

    public function loadUser(){
         $req = $this->getBdd()->query("SELECT * FROM users");
         $req->execute();
         $myUsers = $req->fetchAll(PDO::FETCH_ASSOC);
         $req->closeCursor();

            foreach($myUsers as $user){
                $u = new User($user["id"], $user["email"], $user["username"], $user["MdP"]);
                $this->addUser($u);
            }
    }

    public function loginControl(){

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

            $recupUser = $this->getBdd()->prepare('SELECT * FROM users WHERE email = ? && username = ? && MdP = ? ');
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $MdP = htmlspecialchars($_POST['MdP']);
            

            

            $recupUser->execute(array($email, $username, $MdP, ));
            if($recupUser->rowcount() > 0){ 
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    ?>
                        <script type="text/javascript">
                            alert('Vous etes connecté(e)<?= $_SESSION['username'] ?>');
                            location.href = "<?=URL?>accueil";
                        </script>
                    <?php   
                   
        } 
    }

    public function logoutControl(){
        
        session_start();
        $_SESSION = array();
        session_destroy();
            ?>
                <script type="text/javascript">
                        alert('Vous etes déconnecté(e)'); 
                        location.href = "<?=URL?>accueil";
                </script>
    <?php        
    }
}