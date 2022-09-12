<?php 

require_once("./class/User.php");

?>
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
    <div class="mainRegister">
        <div class="header">
            <div class="headerLogo">
                <a href="index.php">
                    <img src="assets/img/bbcLogo.svg" alt="photo du logo">
                </a>
            </div>

            <div class="headerTitle">
                <h1>CRÉER UN COMPTE</h1>
            </div>
        </div>

        <div class="registerContent">
            <form action="" method="post" class="formRegister">

                <h2>ENTREZ VOS COORDONNÉS</h2>
                <input class="ipRegister" type="text" name="nom" placeholder="Nom">
                <input class="ipRegister" type="text" name="username" placeholder="Nom d'utilisateur">

                <h2>ENTREZ VOTRE MOT DE PASSE</h2>
                <input class="ipRegister" type="password" name="password" placeholder="Mot de passe">

                <h2>ENTREZ VOTRE EMAIL</h2>
                <input class="ipRegister" type="email" name="email" placeholder="Email">
                <p class="infonMail">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur Foundation. Cela ne sera pas affiché sur votre profil.</p>

                <h2>ENTREZ VOTRE BIOGRAPHIE</h2>
                <textarea class="txtRegister" type="text" name="bio" placeholder="Entrez votre bio ici"></textarea>

                
                <h2>TÉLÉCHARGEZ UNE IMAGE DE PROFIL</h2>
                
                <label for="addPic" class="labelPic">
                    
                    <img class='uploadImg'src="assets/img/imagefile.svg" alt="icon pour déposer une photo">
                    <h3>Glisser-déposer ou parcourir un fichier</h3>
                    <h4 style="text-align: center ;">Taille recommandée: JPG, PNG, GIF <br> (150x150px, Max 10mb)</h4>
                
                    <input type="file" name="profilePic" id="addPic" style="display:none;"  accept=".JPG, .PNG, .GIF">
                </label>

                <input class='submitRegister' type="submit" name="register" value="CRÉER UN COMPTE">
            </form>
        </div>

    </div>



</body>
</html>

<?php
if($_POST['register']=="register" && !empty($_POST['nom']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['bio'])){
    $user = new User();
    $user -> register($_POST['nom'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['bio']);
    }