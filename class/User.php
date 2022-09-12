<?php 
require_once("./class/Database.php");
session_start();
class User extends Database {

    public $username;
    public $picture;
    public $bio;
    
    public function register($nom, $username, $password, $email, $bio, $picture) {
        $checkName = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $checkName->bindValue(':username', $username);
        $checkName->execute();
        $checkMail = $this->connect()->prepare("SELECT * FROM users WHERE email = :email");
        $checkMail->bindValue(':email', $email);
        $usernameExist = $checkName->fetch();
        $mailExist = $checkMail->fetch();
        if ($usernameExist != false) {
            echo "Ce nom d'utilisateur est déjà utilisé.";
        }
        elseif ($mailExist != false) {
            echo "Cette adresse email est déjà utilisée.";
        }
        else {
            $insert = $this->connect()->prepare("INSERT INTO `users`(username, password_user, name_user, mail ,bio, picture) VALUES (:username,:mdp,:nom,:mail,:bio, :picture)");
            $insert->bindParam(':username', $username, PDO::PARAM_STR);
            $insert->bindParam(':mdp', $password, PDO::PARAM_STR);
            $insert->bindParam(':nom', $nom, PDO::PARAM_STR);
            $insert->bindParam(':mail', $email, PDO::PARAM_STR);
            $insert->bindParam(':bio', $bio, PDO::PARAM_STR);
            $insert->bindParam(':picture', $picture, PDO::PARAM_STR);
            $insert->execute();
            $_SESSION['name_user'] = $username;
            header("Location:./search.php");
        }
    }

    public function login($username, $password) {
        $login = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $login->bindValue(':username', $username);
        $login->execute();
        $dataUser = $login->fetch();
        if ($dataUser && password_verify($password, $dataUser[password_user])) {
            $_SESSION['name_user'] = $dataUser['name_user'];
            $bio = $dataUser['bio'];
            header('Location: ./search.php');

        }
        else {
            echo "Nom d'utilisateur ou mot de passe incorrect !";
            echo $_SESSION['name_user'];
        }
    }

    public function logout(){
        session_destroy();
        header('Location: ./index.php');
    }

    public function getData($data){
        $userData = $this->connect()->prepare("SELECT $data FROM users WHERE username = :username");
        $userData->bindValue(':username', $_SESSION['name_user']);
        $userData->execute();
        $datas = $userData->fetch();
        return $datas[0];
    }

    public function editData(){
        echo 'hello';
    }
}