<?php include('head.php');
require_once("./class/User.php");
if(isset($_POST['sendMail'])){
    $user = new User();
    $user->passRemember($_POST['email']);
}

include('homePc.php');
?>

<div class="mainReset">
    <div class="header">
                <div class="headerLogo">
                <a href="index.php">
                    <img src="assets/img/bbcLogo.svg" alt="photo du logo">
                </a>
                </div>

                <div class="headerTitle">
                    <h1>MOT DE PASSE PERDU</h1>
                </div>
            </div>

         
        <form action="" method="post" class="formLogin">
                <h2>PAS DE STRESS!</h2>
                <h3 class='resetSubtitle'>Vous ne vous souvenez plus de votre mot de passe et ne parvenez plus à vous connecter. Entrez votre email et réinitialisez le.</h3>
                <input class="ipLogin" type="email" name="email" placeholder="Email" required>
                <button class='submitLogin' type="submit" name="sendMail" value="">RÉINITIALISER LE MOT DE PASSE</button>
        </form>
</div>
 
<?php include('footer.php')?>