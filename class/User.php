<?php 
require_once("./class/Database.php");
session_start();
class User extends Database {
    
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
        $user = $login->fetch();
        if ($user && password_verify($password, $user[password_user])) {
            session_start();
            $_SESSION['name_user'] = $username;
            echo $user['bio'];
            // $_SESSION['bio'] = $this['bio'];
            header('Location: ./search.php');
        }
        else {
            echo "Nom d'utilisateur ou mot de passe incorrect !";
            echo $_SESSION['name_user'];
        }
    }

    public function logout(){
        session_destroy();
        header('Location: ./indexphp');
    }
}