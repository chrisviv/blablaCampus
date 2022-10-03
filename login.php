<?php include('head.php');
require_once("./class/user.php");
if(isset($_POST['login']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $user->login($username, $password);
}
elseif(isset($_POST['login']) && isset($_POST['username']) && !empty($_POST['username'])){
    $login = $_POST['username'];
}

include('./homepc.php');
?>
    <div class="mainLogin">
        <div class="header">
            <div class="headerLogo">
            <a href="index.php">
                <img src="assets/img/bbcLogo.svg" alt="photo du logo">
            </a>
            </div>

            <div class="headerTitle">
                <h1>SE CONNECTER</h1>
            </div>
        </div>

        <form action="" method="post" class="formLogin">
            <h2>ENTREZ VOS COORDONNÉES</h2>
            <input class="ipLogin" type="text" name="username" placeholder="Nom d'utilisateur" value="<?php if(isset($login)){echo $login;}?>">
            <input class="ipLogin" type="password" name="password" placeholder="Mot de passe">
            <input class='submitLogin' type="submit" name="login" value="SE CONNECTER">
        </form>


        <div class="passwordBtn">
            <a href="passwordreset.php">
                <button>MOT DE PASSE OUBLIÉ</button>
            </a>
        </div>
    </div>
    
<?php include('footer.php')?>