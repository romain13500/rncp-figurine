<?php

require_once "modele/FigurineManager.php";

class FigurineController {
    private $figurineManager;



    public function __construct() {
        $this->figurineManager = new FigurineManager;
        $this->figurineManager->loadFigurine();
    }



    public function displayFigurineAdmin() {
        $figurines = $this->figurineManager->getFigurines();
        require_once "view/admin.figurine.view.php";
    }

    public function displayFigurineDragonBall() {
        $figurines = $this->figurineManager->getFigurines();
        require_once "view/dragonball.view.php";
    }

    public function displayFigurineOnePiece() {
        $figurines = $this->figurineManager->getFigurines();
        require_once "view/onepiece.view.php";
    }

    public function displayFigurineNaruto() {
        $figurines = $this->figurineManager->getFigurines();
        require_once "view/naruto.view.php";
    }



    public function NewFigurineForm() {
        
        require_once "view/new.figurine.view.php";
    }

    public function NewFigurineValidation() {
        $this->figurineManager->newFigurineDB($_POST['image'], $_POST['name'], $_POST['price'], $_POST['manga']);
        ?>
            <script type="text/javascript">
                            alert('ajout reussi');
                            location.href = "<?=URL?>figurineadmin";
            </script>
        <?php


    }
    
    public function editFigurineForm($id) {
        $figurine = $this->figurineManager->getFigurineById($id);
        require_once "view/edit.figurine.view.php";
    }

    public function editFigurineValidation($id) {
        $this->figurineManager->updateFigurineDB($_POST['id'] , $_POST['image'], $_POST['name'], $_POST['price'], $_POST['manga']);
        header('location' . URL . 'figurineadmin');
    }

    public function deleteFigurine($id) {
        $this->figurineManager->deleteFigurineDB($id);
        ?>
            <script type="text/javascript">
                            alert('Suppression reussi');
                            location.href = "<?=URL?>figurineadmin";
            </script>
        <?php
    }

    

    
}