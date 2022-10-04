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

    $fileName = $_FILES['profilePic']['name'];
    $fileTmpName = $_FILES['profilePic']['tmp_name'];
    $fileSize = $_FILES['profilePic']['size'];
    $fileError = $_FILES['profilePic']['error'];
    $fileType = $_FILES['profilePic']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','png','gif');

    if (in_array($fileActualExt,$allowed )) {
        if ($fileError === 0) {
            if ($fileSize < 100000000) {
                $picture = base64_encode(file_get_contents(addslashes($fileTmpName)));
            }
        }
    } 
    else{
        $picture = "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";
    }
    $errors = $user->register($name, $pseudo, $password, $email, $bio, $picture);
    if(isset($errors) && strlen($errors) == 41) {
        $usernameError = $errors;
    }else if(isset($errors) && strlen($errors) == 40) {
        $mailError = $errors;
    }
}



include('./homepc.php');
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
                <!-- A STYLISER EN DESSOUS-->
                <p>
                <?php 
                if(isset($usernameError)) {
                    echo $usernameError;
                }?>
                </p>
                <h2>ENTREZ VOTRE MOT DE PASSE</h2>
                <input class="ipRegister" type="password" name="password" placeholder="Mot de passe" required>

                <h2>ENTREZ VOTRE EMAIL</h2>
                <input class="ipRegister" type="email" name="email" placeholder="Email" required>
                <!-- A STYLISER EN DESSOUS-->
                <p>
                <?php 
                if(isset($mailError)) {
                    echo $mailError;
                }?>
                </p>
                <p class="infonMail">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur Foundation. Cela ne sera pas affiché sur votre profil.</p>

                <h2>ENTREZ VOTRE BIOGRAPHIE</h2>
                <textarea class="txtRegister" type="text" name="bio" placeholder="Entrez votre bio ici"></textarea>

                
                <h2>TÉLÉCHARGEZ UNE IMAGE DE PROFIL</h2>
                
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
                  
                
                    <input type="file" name="profilePic" id="addPic" style="display:none;"  accept=".JPG, .PNG, .GIF" >
                </label>

                <input class='submitRegister' type="submit" name="register" value="CRÉER UN COMPTE">
            </form>
        </div>

    </div>


    <script src="assets/js/file.js"></script>

<?php include('footer.php');?>
