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

    public function NewFigurineForm() {
        
        require_once "view/new.figurine.view.php";
    }

    public function NewFigurineValidation() {
        $this->figurineManager->newFigurineDB($_POST['image'], $_POST['name'], $_POST['price'], $_POST['manga']);
        header('location' . URL . 'figurineadmin');
    }

    public function deleteFigurine($id) {
        $this->figurineManager->deleteFigurineDB($id);
        header('location' . URL . 'figurineadmin');
    }

    public function editFigurineForm($id) {
        $figurine = $this->figurineManager->getFigurine($id);
        require_once "view/update.figurine.view.php";
    }

    public function editFigurineValidation($id) {
        $this->figurineManager->updateFigurineDB($id, $_POST['image'], $_POST['name'], $_POST['price'], $_POST['manga']);
        header('location' . URL . 'figurineadmin');
    }

    
}