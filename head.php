<?php 
require_once("./class/User.php");
$allowed = ['/blablacampus/index.php', '/blablacampus/register.php', '/blablacampus/login.php', '/blablacampus/passwordreset.php', '/blablacampus/newpassword.php' , '/blablacampus/confirmation.php'];
if(!isset($_SESSION['name_user']) && !in_array($_SERVER['PHP_SELF'], $allowed)) {
    header('Location: ./index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:description" content="BlaBlaCampus est une application de covoiturage conviviale dédiée aux apprenants du centre de formation Onlinformapro de Lons-le-Saunier. C est une alternative de locomotion que le bus ou le train.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https//leog1514.promo-167.codeur.online/assets/img/bbcLogo.svg">
    <title>BlaBlaCampus</title>
    <link rel="icon" type="image/x-icon" href="assets/img/bbcLogo.svg">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="manifest.json" />
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
        const el = document.createElement('pwa-update');
        document.body.appendChild(el);
    </script>
    
</head>
<body>