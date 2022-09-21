<?php include('head.php');
if(isset($_POST['register'])){
    $pseudo = $_POST['username'];
    $_SESSION['name_user'] = $pseudo;
    require_once("./class/User.php");
    $user = new User();
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $picture = $_FILES['profilePic'];
    $user->register($name, $pseudo, $password, $email, $bio, $picture);
}



include('homePc.php');
?>

    <div class="mainRegister">
        <div class="header">
            <div class="headerLogo">
                <a href="index.php">
                    <img src="assets/img/bbcLogo.svg" alt="photo du logo">
                </a>
            </div>

            <div class="headerTitle">
                <h1>CRÉER UN COMPTE</h1>
            </div>
        </div>

        <div class="registerContent">
            <form action="" method="post" class="formRegister" enctype="multipart/form-data">

                <h2>ENTREZ VOS COORDONNÉS</h2>
                <input class="ipRegister" type="text" name="nom" placeholder="Nom" required>
                <input class="ipRegister" type="text" name="username" placeholder="Nom d'utilisateur" required>

                <h2>ENTREZ VOTRE MOT DE PASSE</h2>
                <input class="ipRegister" type="password" name="password" placeholder="Mot de passe" required>

                <h2>ENTREZ VOTRE EMAIL</h2>
                <input class="ipRegister" type="email" name="email" placeholder="Email" required>
                <p class="infonMail">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur Foundation. Cela ne sera pas affiché sur votre profil.</p>

                <h2>ENTREZ VOTRE BIOGRAPHIE</h2>
                <textarea class="txtRegister" type="text" name="bio" placeholder="Entrez votre bio ici"></textarea>

                
                <h2>TÉLÉCHARGEZ UNE IMAGE DE PROFIL</h2>
                
                <label for="addPic" class="labelPic">
                    
                    <img class='uploadImg'src="assets/img/imagefile.svg" alt="icon pour déposer une photo" enctype="multipart/form-data">
                    <h3>Glisser-déposer ou parcourir un fichier</h3>
                    <h4 style="text-align: center ;">Taille recommandée: JPG, PNG, GIF <br> (150x150px, Max 10mb)</h4>
                
                    <input type="file" name="profilePic" id="addPic" style="display:none;"  accept=".JPG, .PNG, .GIF">
                </label>

                <input class='submitRegister' type="submit" name="register" value="CRÉER UN COMPTE">
            </form>
        </div>

    </div>


    <script>
       
            
        append(homePc, register)
      
        

    </script>
   
    <script src="assets/js/file.js"></script>

<?php include('footer.php');?>
