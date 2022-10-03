<?php include('head.php');
include('./homepc.php');
require_once("./class/User.php");
$user = new User();

if(isset($_GET['t'])) {
    $token = $_GET['t'];
}

if(isset($_POST['confirm'])) {
    if($_POST['mdp'] == $_POST['mdpconfirm']) {
        $password = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $user->resetPassword($password, $token);
    }else {
        echo '<h2>Les mots de passe ne correspondent pas.</h2>';
    }
}

?>



<div class="mainAdd">
<div class="header">
            <div class="headerLogo">
            <a href="index.php">
                <img src="assets/img/bbcLogo.svg" alt="photo du logo">
            </a>
            </div>

            <div class="headerTitle">
                <h1>NOUVEAU MOT DE PASSE</h1>
            </div>
        </div>



    <form action="" method="POST" class="formAdd" id='formAdd'>
        <h1>ENTREZ VOTRE NOUVEAU MOT DE PASSE</h1>

        <div class="addBox  autocomplete-container" id="container-add">

           
            <input type="password" placeholder="Nouveau mot de passe" name="mdp" id='inputDepart2' value="" required>
        </div>

      

        <div class="addBox">
           
            <input type="password" name="mdpconfirm" id='inputDepart' value="" placeholder="Confimation mot de passe" required>
        </div>
        <input type="submit" name="confirm" class="searchBtn" value="CONFIRMER">
    </form>
</div>





<?php include('footer.php');?>