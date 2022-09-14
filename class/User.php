<?php 
session_start();
require_once("./class/Database.php");
class User extends Database {
    
    public $username;
    public $name;
    public $mail;
    public $picture;
    public $bio;
    private $password;
    private $id;
    
    // public function __construct($pseudo){
    //     $initData = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
    //     if(isset($_SESSION['name_user']) && $_SESSION['name_user'] != ''){
    //         $initData->bindValue(':username', $_SESSION['name_user']);
    //     }
    //     else{
    //         $initData->bindValue(':username', $pseudo);
    //     }
    //     $initData->execute();
    //     $dataUser = $initData->fetch();
    //     $this->id = $dataUser[0];
    //     $this->username = $dataUser[1];
    //     $this->password = $dataUser[2];
    //     $this->name = $dataUser[3];
    //     $this->mail = $dataUser[4];
    //     $this->bio = $dataUser[5];
    //     $this->picture = $dataUser[6];
    // }
    
    public function register($nom, $pseudo, $password, $email, $bio, $picture) {
        $checkName = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $checkName->bindValue(':username', $pseudo);
        $checkName->execute();
        $checkMail = $this->connect()->prepare("SELECT * FROM users WHERE email = :email");
        $checkMail->bindValue(':email', $email);
        $usernameExist = $checkName->fetch();
        $mailExist = $checkMail->fetch();
        if ($usernameExist != false) {
            echo "Ce nom d'utilisateur est déjà utilisé.";
            session_destroy();
        }
        elseif ($mailExist != false) {
            echo "Cette adresse email est déjà utilisée.";
            session_destroy();
        }
        else {
            $insert = $this->connect()->prepare("INSERT INTO `users`(username, password_user, name_user, mail ,bio, picture) VALUES (:username,:mdp,:nom,:mail,:bio, :picture)");
            $insert->bindParam(':username', $pseudo, PDO::PARAM_STR);
            $insert->bindParam(':mdp', $password, PDO::PARAM_STR);
            $insert->bindParam(':nom', $nom, PDO::PARAM_STR);
            $insert->bindParam(':mail', $email, PDO::PARAM_STR);
            $insert->bindParam(':bio', $bio, PDO::PARAM_STR);
            $insert->bindParam(':picture', $picture, PDO::PARAM_STR);
            $insert->execute();
            header('Location: ./search.php');
            $catchData = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
            $catchData->bindValue(':username', $pseudo);
            $catchData->execute();
            $regData = $catchData->fetch();
            $username = $catchData['username'];
            getData($username);
        }
    }

    public function login($username, $password) {
        $login = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $login->bindValue(':username', $username);
        $login->execute();
        $logData = $login->fetch();
        if ($logData && password_verify($password, $logData[2])) {
            $_SESSION['name_user'] = $logData['username'];
            header('Location: ./search.php');
            $username = $logData['username'];
            getData($username);
        }
        else {
            echo "Nom d'utilisateur ou mot de passe incorrect !";
        }
    }

    public function logout(){
        session_destroy();
        header('Location: ./index.php');
    }

    public function getData($username){
        $userData = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $userData->bindValue(':username', $username);
        $userData->execute();
        $datas = $userData->fetch();
        $this->id = $datas[0];
        $this->username = $datas[1];
        $this->password = $datas[2];
        $this->name = $datas[3];
        $this->mail = $datas[4];
        $this->bio = $datas[5];
        $this->picture = $datas[6];
    }

    public function editData($username, $password, $email, $bio, $picture){
        if ($this && password_verify($password, $this->password)) {
            $checkMail = $this->connect()->prepare("SELECT * FROM users WHERE email = :email");
            $checkMail->bindValue(':email', $email);
            $mailExist = $checkMail->fetch();
            if ($mailExist != false) {
                echo "Cette adresse email est déjà utilisée.";
            }
            else {
                $insert = $this->connect()->prepare("UPDATE `users` SET username = :username, SET mail = :mail, SET bio = :bio, SET picture = :picture WHERE id_user = :id");
                $insert->bindParam(':username', $username, PDO::PARAM_STR);
                $insert->bindParam(':mail', $email, PDO::PARAM_STR);
                $insert->bindParam(':bio', $bio, PDO::PARAM_STR);
                $insert->bindParam(':picture', $picture, PDO::PARAM_STR);
                $insert->bindValue(':id', $this->id);
                $insert->execute();
                header("Location:./search.php");
            }
        }
        else {
            echo "Mot de passe incorrect !";
            echo $_SESSION['name_user'];
        }
    }
}