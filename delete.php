<?php include('head.php');
require_once("./class/trajects.php");
$trajet = new Trajects($_SESSION['name_user']);
if(isset($_GET['delete'])) {
    $trajet->deleteTraject($_GET['id_trajet']);
}
<<<<<<< HEAD
include('homepc.php');
=======
include('./homepc.php');
>>>>>>> 5871de78af5df6328b1a1fc458927f81061b8ec7


?>

<div class="deleteMain">
    <?php include('navbar.php')?>
    <h1>SUPPRIMER</h1>
    <p>Etes vous sur de vouloir supprimer ce trajet?</p>
    <form action="" method="GET">
        <input type="hidden" name="id_trajet" value="<?php if(isset($_GET['supp'])) {echo $_GET['supp'];} ?>">
        <div class="ipDelConfirm">
        <input type='submit' name="delete" value="SUPPRIMER"  class="deleteBtn">
        
    </div>
    <div class="ipDeleteBox">
        <a href="./trajets.php" class="deleteReturn">RETOUR</a>
    </div>
</div>
</form>
    

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>