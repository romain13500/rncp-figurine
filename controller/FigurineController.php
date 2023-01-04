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

    
}