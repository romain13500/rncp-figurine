<?php

require_once "modele/panierManager.php";

class PanierController{
    private $panierManager;

    public function __construct(){
        $this->panierManager = new PanierManager;
        $this->panierManager->loadPanier();
    }

    public function displayPanier(){
        $paniers = $this->panierManager->getPaniers();
        require_once "view/panier.view.php";
    }

    public function SessionPanier(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['name'] = array();
            $_SESSION['panier']['price'] = array();
            $_SESSION['panier']['quantity'] = array();
        }
        else{
            return true;
        }
    }

    public function totalPanier(){
        $total = 0;
        for($i = 0; $i < count($_SESSION['panier']['name']); $i++){
            $total += $_SESSION['panier']['price'][$i] * $_SESSION['panier']['quantity'][$i];
        }
        return $total;
    }
}
   