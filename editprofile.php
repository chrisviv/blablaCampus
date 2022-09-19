<?php include('head.php');
// include('upload.php');
require_once("./class/User.php");
$user = new User();
$user->getData($_SESSION['name_user']);
var_dump($_FILES['profilePic']['tmp_name']);

if(isset($_POST['edit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $picture = $_POST['profilePic'];
    $user->editData($username, $email, $bio, $picture);
}

?>

    <div class="mainRegister">
     

          

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
                
                    <img class='uploadImg'src="assets/img/imagefile.svg" alt="icon pour déposer une photo">
                    <h3>Glisser-déposer ou parcourir un fichier</h3>
                    <h4 style="text-align: center ;">Taille recommandée: JPG, PNG, GIF <br> (150x150px, Max 10mb)</h4>
                
                    <input type="file" name="profilePic" id="addPic" style="display:none;"  accept=".JPG, .PNG, .GIF">
                </label>

                <input class='submitRegister' type="submit" name="edit" value="METTRE À JOUR">
            </form>
        </div>
    </div>

    <script src="assets/js/user.js"></script>
    <script src="assets/js/file.js"></script>
<?php include('footer.php')?>