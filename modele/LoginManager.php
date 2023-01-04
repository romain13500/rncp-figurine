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

            $recupUser = $this->getBdd()->prepare('SELECT * FROM users WHERE email = ? && username = ? && MdP = ?');
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $MdP = htmlspecialchars($_POST['MdP']);
           
            $recupUser->execute(array($email, $username, $MdP));

            if($recupUser->rowcount() > 0) {
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