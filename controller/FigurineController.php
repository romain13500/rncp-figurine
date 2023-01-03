<?php

require_once "modele/FigurineManager.php";

class FigurineController {
    private $figurineManager;



    public function __construct() {
        $this->figurineManager = new FigurineManager;
        $this->figurineManager->loadFigurine();
    }


    
}