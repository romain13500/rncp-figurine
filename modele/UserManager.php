<?php

require_once "modele/Manager.php";
require_once "modele/Users.php";

// ------ CREATION DE LA CLASS EXTEND DE MANAGER --------

class UserManager extends Manager{
    private $users;

    public function addUser($user){
        $this->users[] = $user;
    }
    public function getUsers(){
        return $this->users;
    } 




    // -------------------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------ AJOUT D'UN USER -----------------------------------------------------------------------------

        public function newUserDB( $email, $username, $MdP, $role ){

            $req = " INSERT INTO users ( email, username, MdP, role) VALUES ( :email, :username, :MdP, :role) ";
                // $MdP = password_hash($MdP, PASSWORD_DEFAULT);
            $statement = $this->getBdd()->prepare($req);
            $statement->bindValue(":email", $email, PDO::PARAM_STR);
            $statement->bindValue(":username", $username, PDO::PARAM_STR);
            $statement->bindValue(":MdP", $MdP, PDO::PARAM_STR);
            $statement->bindValue(":role",'user', PDO::PARAM_STR);
            $result = $statement->execute();
            $statement->closeCursor();

            if($result){
                $user = new User($this->getBdd()->lastInsertId(),  $email, $username, $MdP, 'user');
                $this->addUser($user);
                ?>
                        <script type="text/javascript">
                            alert('Félicitation,vous etes inscrit(e)');
                            location.href = "<?=URL?>login";
                        </script>
                    <?php   
            }


        }

    // -------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------CHARGEMENT DE LA TABLE----------------------------------------------------------------------------------

        public function loadUser(){
                     
            $req = $this->getBdd()->query("SELECT * FROM users");// ---- SELECTION DE LA TABLE "USERS"  -----    
            $req->execute();  //----- EXECUTE LA REQUETE
            $myUsers = $req->fetchAll(PDO::FETCH_ASSOC);  // RECUPERE LES DONNEES DE LA TABLE "USERS"
            $req->closeCursor();
                        
                // ---- BOUCLE POUR RECUPERER LES DONNEES DE LA TABLE "USERS" ET LES STOCKER DANS LA CLASS USER
                
            foreach ($myUsers as $user) {
                $u = new User($user["id"], $user["email"], $user["username"], $user["MdP"], $user["role"]);
                $this->addUser($u); // ----STOCK DANS PRIVATE $USERS, $MYUSERS QUI PROVIENT DE LA BDD
            }
        }


    // -------------------------------------------------------------------------------------------------------------------------------------
    // -------------------RECUP ID----------------------------------------------------------------------------------------------
        
        public function getUserById($id){
                // ------ boucle pour recuperer l'id du jeu dans la table  --------
            foreach ($this->users as $user) {
                if($user->getId() == $id){
                    return $user;
                }
            }
        }

    // -------------------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------ EDIT -----------------------------------------------------------------------------


        public function editUserDB($id, $email, $username, $MdP){
            
            $req = " UPDATE users SET  email = :email, username = :username, MdP = :MdP WHERE id = :id ";
            $statement = $this->getBdd()->prepare($req);
            $statement->bindValue(":id", $id, PDO::PARAM_INT);
            $statement->bindValue(":email", $email, PDO::PARAM_STR);
            $statement->bindValue(":username", $username, PDO::PARAM_STR);
            $statement->bindValue(":MdP", $MdP, PDO::PARAM_STR);
            $result = $statement->execute();
            $statement->closeCursor();
            
            if($result){
                $user = $this->getUserById($id);
                $user->setEmail($email);
                $user->setUsername($username);
                $user->setMdP($MdP);          
            }
        }



    // -------------------------------------------------------------------------------------------------------------------------------------
    // ---------------------------------------------------- DELETE ---------------------------------------------------------------

        public function deleteUserDB($id){
            $req = " DELETE FROM users WHERE id = :id ";
            $statement = $this->getBdd()->prepare($req);
            $statement->bindValue(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            $statement->closeCursor();

            if($result){
                $user = $this->getUserById($id);
                unset($user);
            }
        }

              
}