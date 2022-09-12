<?php include('head.php');
require_once("./class/User.php");
if(isset($_GET['login'])){
    $username = $_GET['username'];
    $password = $_GET['password'];
    $user = new User();
    $user->login($username, $password);
}

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


       
           
            
            <form action="" method="get" class="formLogin">
                <h2>ENTREZ VOS COORDONNÉS</h2>
                <input class="ipLogin" type="text" name="username" placeholder="Nom d'utilisateur">
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