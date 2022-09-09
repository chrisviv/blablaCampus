<?php 
require_once("./class/Database.php");
require '../class/Autoloader.php';
class User extends Database {
    
    public function register($nom, $username, $password, $email, $bio) {
        $checkName = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $CheckName->bindValue(':username', $username);
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
            $insert = $this->connect()->prepare("INSERT INTO users (username, password, name, mail, bio) VALUE (:username, :password, :name, :mail, :bio)");
            $insert->bindValue(':username', $username);
            $insert->bindValue(':password', $password);
            $insert->bindValue(':name', $name);
            $insert->bindValue(':mail', $mail);
            $insert->bindValue(':bio', $bio);
            $insert->execute();
            $_SESSION['name_user'] = $username;
        }
    }

    public function login($username, $password) {
        $login = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $login->bindValue(':username', $username);
        $user = $login->fetch();
        if ($user $$ password_verify($password, $user[password])) {
            $_SESSION['name_user'] = $username;
            echo $_SESSION['name_user'];
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