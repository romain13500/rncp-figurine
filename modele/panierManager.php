<?php

require_once "modele/Manager.php";
require_once "modele/panier.php";

class PanierManager extends Manager{
    private $paniers;

    public function addPanier($panier) {
        $this->paniers[] = $panier;
    }
    public function getPaniers() {
        return $this->paniers;
    }

    public function loadPanier() {
        $req = $this->getBdd()->prepare("SELECT * FROM panier");
        $req->execute();
        $myPaniers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myPaniers as $panier) {
            $p = new Paniers($panier['id'], $panier['name'], $panier['price'], $panier['quantity']);
            $this->addPanier($p);
        }
    }

    public function newPanierDB($name, $price) {
        $req = "INSERT INTO panier (name, price, quantity) VALUES (:name, :price, :quantity)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":price", $price, PDO::PARAM_INT);
        $statement->bindValue(":quantity", $quantity, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $panier = new Paniers($this->getBdd()->lastInsertId(), $name, $price, $quantity);
            $this->addPanier($panier);
        }
    }
}