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

    <div class="mainAccueil none">
        <div class="logo-container">
      
            <div class="logo-img">
                <img src="assets/img/bubble.svg" alt="logo de blablacampus" class="bb">
                <img src="assets/img/car.svg" alt="logo de blablacampus" class="car">
            </div>

            <div class="logo-Tittle">           
               <div class="animation">
                    <div class="b">B</div>
                    <div class="l">L</div>
                    <div class="a">A</div>
                    <div class="b2">B</div>
                    <div class="l2">L</div>
                    <div class="a2">A</div>
               </div>
                <h1 class="campus">CAMPUS</h1>
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