<?php

include('head.php');
require_once("./class/Trajects.php");



?>
    <?php include('./homepc.php');
    if(isset($_SESSION['name_user'])){
        $trajet = new Trajects($_SESSION['name_user']);
        $trajet->redirect("./search.php", "0");
    }
    
    ?>

    <div class="mainAccueil">
        <div class="logo-container">
            <div class="logo-img"><img src="assets/img/bbcLogo.svg" alt="logo de blablacampus"></div>
            <div class="logo-Tittle">
                <h1>BLABLA</h1>
            </div>
        </div>

        <div class="startBtn" id="startBtn">
            <a href="register.php">
                <img src="assets/img/car-icon.svg" alt="icon d'une voiture">
                <button>COMMENCER</button>
            </a>
        </div>

        <div class="loginBtn" id="loginBtn">
            <a href="login.php">
                <button>SE CONNECTER</button>
            </a>
        </div>

    </div>
    
<?php include('footer.php')?>