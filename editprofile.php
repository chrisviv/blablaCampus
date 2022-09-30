<?php include('head.php');
require_once("./class/user.php");
$user = new User();
$user->getData($_SESSION['name_user']);


if(isset($_POST['edit'])){




    if($_FILES['profilePic']['name'] == '') {
        $picture = $user->picture;
    }
    else {
        var_dump($_FILES['profilePic']);
        $fileName = $_FILES['profilePic']['name'];
        $fileTmpName = $_FILES['profilePic']['tmp_name'];
        $fileSize = $_FILES['profilePic']['size'];
        $fileError = $_FILES['profilePic']['error'];
        $fileType = $_FILES['profilePic']['type'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','png','gif');
        if(in_array($fileActualExt,$allowed )) {
            if($fileError === 0) {
                if($fileSize < 1000000) {
                    $picture = base64_encode(file_get_contents(addslashes($fileTmpName)));
                }
            }
        }
    }
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $user->editData($username, $email, $bio, $picture);

   

}
<<<<<<< HEAD
include('homepc.php');
=======
include('./homepc.php');
>>>>>>> 5871de78af5df6328b1a1fc458927f81061b8ec7

?>

    <div class="mainRegister">
        
        <?php include('navbar.php'); ?>

          

        <div class="registerContent">
            <form action="" method="post" class="formRegister" enctype="multipart/form-data">

                <h2>MODIFIEZ VOS COORDONNÉS</h2>
                <input class="ipRegister" type="text" name="username" placeholder="Nom d'utilisateur" value="<?php echo $user->username ?>" required>

                <h2>MODIFIEZ VOTRE EMAIL</h2>
                <input class="ipRegister" type="email" name="email" placeholder="Email" value="<?php echo $user->mail ?>" required>
                <p class="infonMail">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur Foundation. Cela ne sera pas affiché sur votre profil.</p>

                <h2>MODIFIEZ VOTRE BIOGRAPHIE</h2>
                <textarea class="txtRegister" type="text" name="bio" placeholder="Entrez votre bio ici"><?php echo $user->bio ?></textarea>

                
                <h2>MODIFIER VOTRE IMAGE DE PROFIL</h2>
                
                <label for="addPic" class="labelPic">
                
                <div class="labelContent">
                    <img class='uploadImg'src="assets/img/imagefile.svg" alt="icon pour déposer une photo" draggable="false" enctype="multipart/form-data">
                    <h3>Glisser-déposer ou parcourir un fichier</h3>
                    <h4 style="text-align: center ;">Taille recommandée: JPG, PNG, GIF <br> (150x150px, Max 10mb)</h4>
                    </div>

                    <div class="hiddenContent none">
                        <img src="assets/img/plus-solid.svg" alt="icon de plus" draggable="false">
                    </div>
                    <div class="hiddenContent2 none">
                        <img src="" alt="icon de plus" draggable="false" class='check-false'>
                        <h2 class="nameImg"></h2>
                    </div>
                
                    <input type="file" name="profilePic" id="addPic" style="display:none;"  accept=".JPG, .PNG, .GIF">
                </label>

                <input class='submitRegister' type="submit" name="edit" value="METTRE À JOUR">
            </form>
        </div>
    </div>

    <script src="assets/js/user.js"></script>
    <script src="assets/js/file.js"></script>
<?php include('footer.php')?>