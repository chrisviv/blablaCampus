<?php include('head.php');
require_once("./class/User.php");

if(isset($_POST['edit']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])){
    $user = new User($username);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $picture = $_POST['profilePic'];
    $user->editData($username, $password, $email, $bio, $picture);
}

?>

    <div class="mainRegister">
     <?php include('navbar.php') ?>

          

        <div class="registerContent">
            <form action="" method="post" class="formRegister">

                <h2>MODIFIEZ VOS COORDONNÉS</h2>
                <input class="ipRegister" type="text" name="username" placeholder="Nom" value="<?php echo $user->getData('username') ?>">

                <h2>MODIFIEZ VOTRE MOT DE PASE</h2>
                <input class="ipRegister" type="password" name="password" placeholder="Mot de passe" required>

                <h2>MODIFIEZ VOTRE EMAIL</h2>
                <input class="ipRegister" type="email" name="email" placeholder="Email" value="<?php echo $user->getData('mail') ?>">
                <p class="infonMail">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur Foundation. Cela ne sera pas affiché sur votre profil.</p>

                <h2>MODIFIEZ VOTRE BIOGRAPHIE</h2>
                <textarea class="txtRegister" type="text" name="bio" placeholder="Entrez votre bio ici"><?php echo $user->getData('bio') ?></textarea>

                
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