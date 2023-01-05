<?php

require_once "modele/Manager.php";
require_once "modele/Figurines.php";

class FigurineManager extends Manager {
    private $figurines;

    public function addFigurines($figurine) {
       $this->figurines[] = $figurine;
    }
    public function getFigurines() {
        return $this->figurines;
    }


    public function loadFigurine() {
        $req = $this->getBdd()->prepare("SELECT * FROM figurine");
        $req->execute();
        $myFigurines = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myFigurines as $figurine) {
            $f = new Figurines($figurine['id'], $figurine['image'], $figurine['name'], $figurine['price'], $figurine['manga']);
            $this->addFigurines($f);
        }
    }

  // ********************************************************************************************************************
  // ***************************** AJOUTER UNE FIGURINE *****************************************************************
  // ********************************************************************************************************************

    public function newFigurineDB($image, $name, $price, $manga) {

        

        $req = "INSERT INTO figurine (image, name, price, manga) VALUES (:image, :name, :price, :manga)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":image", $image, PDO::PARAM_STR);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":price", $price, PDO::PARAM_INT);
        $statement->bindValue(":manga", $manga, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $figurine = new Figurines($this->getBdd()->lastInsertId(), $image, $name, $price, $manga);
            $this->addFigurines($figurine);
        }
    }


  // ********************************************************************************************************************
  // ***************************** RECUPERATION DE L'ID *****************************************************************
  // ********************************************************************************************************************


    public function getFigurineById($id) {
       foreach($this->figurines as $figurine) {
           if($figurine->getId() == $id) {
               return $figurine;
            }
        }   
    }

  // ***********************************************************************************************************************
  // ***************************** MODIFIER FIGURINE ***********************************************************************
  // ***********************************************************************************************************************

    public function updateFigurineDB($id, $image, $name, $price) {
        $req = "UPDATE figurine SET image = :image, name = :name, price = :price WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":image", $image, PDO::PARAM_STR);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":price", $price, PDO::PARAM_INT);
        
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $figurine = $this->getFigurineById($id);
            $figurine->setImage($image);
            $figurine->setName($name);
            $figurine->setPrice($price);
            
        }
    }

    // ***********************************************************************************************************************
    // ***************************** SUPPRIMER FIGURINE ***********************************************************************
    // ***********************************************************************************************************************

    public function deleteFigurineDB($id) {
        $req = "DELETE FROM figurine WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $figurine = $this->getFigurineById($id);
            unset ($figurine);
        }
    }



}