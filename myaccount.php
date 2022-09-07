<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlaBlaCampus</title>
    <link rel="icon" type="image/x-icon" href="assets/img/bbcLogo.svg">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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

    <div class="userPanel">

       <div class="profileContainer">
         <img src="https://picsum.photos/200/300" alt="Photo de profil">
        
         <div class="profile">
             <h2>Chris</h2>
             <h3>Coucou cest moi</h3>
         </div>
       </div>
        
       <div class="trajetBtn">
        <a href="trajets.php">
            <button>PROPOSER UN TRAJET</button>
        </a>
        </div>

        <div class="profileOptions">

            <div class="modalLink">
                <img src="assets/img/people.svg" alt="">
                <a href="http://">Mes trajets</a>
            </div>

            <div class="modalLink">
                <img src="assets/img/book.svg" alt="">
                <a href="http://">Mes réservations</a>
            </div>

            <div class="modalLink">
                <img src="assets/img/people.svg" alt="">
                <a href="http://">Modifier mes informations</a>
            </div>
            
            <div class="modalLink">
                <img src="assets/img/bx_message.svg" alt="">
                <a href="http://">Messagerie</a>
            </div>

            <div class="modalLink">
                <img src="assets/img/ForwardArrow.png" alt="">
                <a href="http://">Se déconnecter</a>
            </div>
        </div>
        
    </div>
</body>
</html>