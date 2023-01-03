<?php 
// on cree une classe abstraite pour la connexion a la bdd (pas de creation d'objet car "abstract class")
// MANAGER =  CLASS MERE ET CONEXION A LA BDD

abstract class Manager{
    private $pdo;

// PAS D'HERITAGE DANS LA CLASS ET PAS TRANSMIS MAIS ACCES EN DEHORS SANS INSTANCIATION (STATIC) (car abstract class)

    private function setBdd(){
        
        $this->pdo = new PDO('mysql:host=localhost;dbname=site-figurine;charset=utf8', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);  
    }


    protected function getBdd(){ // ---- HERITAGE ET TRANSMIS DANS LA CLASS

        // SI LA CONEXION N'EST PAS FAITE, ON  se connecte
        if($this->pdo == null){
            $this->setBdd();
        }
        return $this->pdo; // ---- DONNE ACCES A LA CONEXION
    }
}
?>