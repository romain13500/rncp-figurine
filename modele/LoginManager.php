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
                $u = new User($user["id"], $user["email"], $user["username"], $user["MdP"], $user["role"]);
                $this->addUser($u);
            }
    }

    

    public function getUserByEmail($email, $MdP){

        $this->loadUser();

        foreach ($this->users as $user) {
            if ($email == $user->getEmail() && $MdP == $user->getMdP()) {
                return $user;
            }
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