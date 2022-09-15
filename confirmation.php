<?php include("head.php");
require_once("./class/User.php");

?>  

    <div class="header">
        <div class="headerLogo">
        <a href="index.php">
            <img src="assets/img/bbcLogo.svg" alt="photo du logo">
        </a>
        </div>

        <div class="headerTitle">
            <h1>CONFIRMATION</h1>
        </div>
    </div>

    <div class="confirmMsg">
        <h1>FÉLICITATION!</h1>
        <h2 class='msg'><?php echo $_SESSION['confirmMessage'] ?></h2>
    </div>

    <script src="assets/js/redirect.js"></script>
<?php include("footer.php")?>