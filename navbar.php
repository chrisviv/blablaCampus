<?php
require_once("./class/User.php");
$user = new User('');

$user->getData($_SESSION['name_user']);


?>
<div class="header">
        <div class="headerLogo">
        <a href="index.php">
            <img src="assets/img/bbcLogo.svg" alt="photo du logo">
        </a>
        </div>

        <div class="headerTitle">
            <img src="assets/img/userIcon.svg" alt="icone du utilisateur" id="userBtn">
        </div>
    </div>

    <div class="userPanel none" id="userPanel">

       <div class="profileContainer">
        <?php echo '<img src="data:image;base64,' . $user->picture . '" alt="Photo de Profil"/>';?>
        
        
         <div class="profile">
             <h2><?php echo $user->username; ?></h2>
             <h3><?php echo $user->bio; ?></h3>
         </div>
       </div>
        
       <div class="trajetBtn">
        <a href="add.php">
            <img src="assets/img/addroad.svg" alt="Icône de route">
            <button>PROPOSER UN TRAJET</button>
        </a>
        </div>

        <div class="profileOptions">

            <div class="modalLink">
                <img src="assets/img/people.svg" alt="icon d'un bonhomme">
                <a href="trajets.php">Mes trajets</a>
            </div>

            <div class="modalLink">
                <img src="assets/img/book.svg" alt="icon du livre de réservation">
                <a href="reservations.php">Mes réservations</a>
            </div>

            <div class="modalLink">
                <img src="assets/img/people.svg" alt="icon d'un bonhomme">
                <a href="editprofile.php">Modifier mes informations</a>
            </div>
            
            <div class="modalLink">
                <img src="assets/img/bx_message.svg" alt="icon du message">
                <a href="messagerie.php">Messagerie</a>
            </div>

            <div class="modalLink">
                <img src="assets/img/ForwardArrow.png" alt="icon d'un flèche pour se déconnecter">
                <a href="logout.php">Se déconnecter</a>
            </div>
        </div>
    </div>
    