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

        public function newUserDB( $email, $username, $MdP){

                // ------ VERIFICATION DES CHAMPS --------

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

            elseif (empty($_POST['MdP'])){
                $errors['mdp'] = "Veuillez entrer un mot de passe";
                ?>
                        <script type="text/javascript">
                            alert('<?= $errors['mdp'] ?>');
                            location.href = "<?=URL?>inscription";
                        </script>
                <?php 
            }

                // ------- FIN VERIFICATION DES CHAMPS --------

            $req = " INSERT INTO users ( email, username, MdP, role_user) VALUES ( :email, :username, :MdP, :role_user) ";
                // $MdP = password_hash($MdP, PASSWORD_DEFAULT);
            $statement = $this->getBdd()->prepare($req);
            $statement->bindValue(":email", $email, PDO::PARAM_STR);
            $statement->bindValue(":username", $username, PDO::PARAM_STR);
            $statement->bindValue(":MdP", $MdP, PDO::PARAM_STR);
            $statement->bindValue(":role_user", 2, PDO::PARAM_INT);
    
    
            $result = $statement->execute();
            $statement->closeCursor();
            if($result){
                $user = new User($this->getBdd()->lastInsertId(),  $email, $username, $MdP);
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
                $u = new User($user["id"], $user["email"], $user["username"], $user["MdP"]);
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
                $this->getUserById($id)->setEmail($email);
                $this->getUserById($id)->setUsername($username);
                $this->getUserById($id)->setMdP($MdP);
                        
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