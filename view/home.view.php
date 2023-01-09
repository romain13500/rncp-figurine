<?php 
ob_start(); 


?>

<p> Accueil</p>

<div class="container">
    <div class="block">
        <div class="row">
        
            <h2 class="mt-3 mb-5 text-danger">TOP VENTE</h2>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="cards m-auto border-dark shadow-lg p-3 mb-5 rounded bg-primary" style="width: 17rem;">
                <img  src="image/dragonball/goku.jpeg" class="card-img-top" alt="...">
                <hr>
                <div class="card-body">
                    <h5 class="card-title">San Goku</h5>
                    <p class="card-text">20 euros</p>
                    <a href="#" class="btn btn-dark">Acheter</a>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="cards m-auto border-dark shadow-lg p-3 mb-5 bg-primary rounded" style="width: 17rem;">
                <img src="image/naruto/naruto.jpeg" class="card-img-top" alt="...">
                <hr>
                <div class="card-body">
                    <h5 class="card-title">Naruto</h5>
                    <p class="card-text">20 euros</p>
                    <a href="#" class="btn btn-dark">Acheter</a>
                </div>
            </div>
        </div>

        <div class="carousel-item">
        <div class="cards m-auto border-dark shadow-lg p-3 mb-5 bg-primary rounded" style="width: 17rem;">
                <img src="image/onepiece/luffy.jpeg" class="card-img-top" alt="...">
                <hr>
                <div class="card-body">
                    <h5 class="card-title">Luffy</h5>
                    <p class="card-text">20 euros</p>
                    <a href="#" class="btn btn-dark">Acheter</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
            
        </div>
    </div>
</div>


</div> 

<div class="container mt-5">
    <div>
        <img class="w-75" src="image/dragonball/baniereDragonBall.jpeg" alt="img">
    </div>
    <p class="text-center "><a class=" text-decoration-none text-warning" href="dragonball"> Dragon Ball</a></p>
</div><br>

<div class="container">
    <div>
        <img class="w-75" src="./image/onepiece/maxresdefault.jpg" alt="img">
    </div>
    <p class="text-center"><a class="text-decoration-none text-warning" href="onepiece">One Piece</a></p>
</div><br>

<div class="container">
    <div>
        <img class="w-75" src="./image/naruto/universnaruto.jpg" alt="img">
    </div>
    <p class="text-center"><a class="text-decoration-none text-warning" href="naruto">Naruto </a></p>
</div>


<?php
$content = ob_get_clean();
$title = "Bienvenue dans le monde des figurines";
require_once "base.html.php";


?>