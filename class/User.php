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
    public $id;

//Fonction d'enregistrement d'un nouvel utilisateur
    public function register($nom, $pseudo, $password, $email, $bio, $picture) {
        $checkName = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $checkName->bindValue(':username', $pseudo);
        $checkName->execute();
        $checkMail = $this->connect()->prepare("SELECT * FROM users WHERE mail = :email");
        $checkMail->bindValue(':email', $email);
        $checkMail->execute();
        $usernameExist = $checkName->fetch();
        $mailExist = $checkMail->fetch();
        if ($usernameExist != false) {
            echo "Ce nom d'utilisateur est déjà utilisé.";
            session_destroy();
        }else if ($mailExist != false) {
            echo "Cette adresse email est déjà utilisée.";
            session_destroy();
        }
        else {
            $insert = $this->connect()->prepare("INSERT INTO `users`(username, password_user, name_user, mail ,bio, picture) VALUES (:username, :mdp, :nom, :mail, :bio, :picture)");
            $insert->bindParam(':username', $pseudo, PDO::PARAM_STR);
            $insert->bindParam(':mdp', $password, PDO::PARAM_STR);
            $insert->bindParam(':nom', $nom, PDO::PARAM_STR);
            $insert->bindParam(':mail', $email, PDO::PARAM_STR);
            $insert->bindParam(':bio', $bio, PDO::PARAM_STR);
            $insert->bindParam(':picture', $picture, PDO::PARAM_STR);
            $insert->execute();
            var_dump($pseudo);
            $_SESSION['name_user'] = $pseudo;
            $_SESSION['confirmMessage'] = 'Votre compte a bien été créé !';
            // $catchData = $this->connect()->prepare("SELECT username FROM users WHERE username = :username");
            // $catchData->bindParam(':username', $pseudo, PDO::PARAM_STR);
            // $catchData->execute();
            // $regData = $catchData->fetch();
            // getData($pseudo);
            header('Location: ./confirmation.php');
            
        }
    }

//Système de connection
    public function login($username, $password) {
        $login = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $login->bindValue(':username', $username);
        $login->execute();
        $logData = $login->fetch();
        if ($logData && password_verify($password, $logData[2])) {
            $_SESSION['name_user'] = $logData['username'];
            $_SESSION['confirmMessage'] = 'Vous êtes bien connecté !';
            header('Location: ./confirmation.php');
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

//Initialisation des variables utilisateur
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

// Modification des informations utilisateur
    public function editData($username, $email, $bio, $picture){
        $checkMail = $this->connect()->prepare("SELECT * FROM users WHERE mail = :email");
        $checkMail->bindValue(':email', $email);
        $checkMail->execute();
        $checkName = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
        $checkName->bindValue(':username', $username);
        $checkName->execute();
        $mailExist = $checkMail->fetch();
        $nameExist = $checkName->fetch();
        if ($mailExist != false && $mailExist['mail'] != $this->mail) {
            echo "Cette adresse email est déjà utilisée.";
        }
        elseif ($nameExist != false && $nameExist['username'] != $this->username){
            echo "Ce nom d'utilisateur est déjà utilisé.";
        }
        else {
            $insert = $this->connect()->prepare("UPDATE `users` SET `username`= :username , `mail`= :mail , `bio`= :bio , `picture`= :picture WHERE id_user = :id");
            $insert->bindParam(':username', $username, PDO::PARAM_STR);
            $insert->bindParam(':mail', $email, PDO::PARAM_STR);
            $insert->bindParam(':bio', $bio, PDO::PARAM_STR);
            $insert->bindParam(':picture', $picture, PDO::PARAM_STR);
            $insert->bindValue(':id', $this->id);
            $insert->execute();
            $_SESSION['name_user'] = $username;
            $_SESSION['confirmMessage'] = 'Vos informations ont bien été mises à jour !';
            header("Location:./confirmation.php");
            getData($_SESSION['name_user']);
        }
    }

// Envoie de mail pour récupération de mot de passe
    public function passRemember($email) {
        $checkMail = $this->connect()->prepare("SELECT mail FROM users WHERE mail = :email");
        $checkMail->bindValue(':email', $email);
        $checkMail->execute();
        $mailExist = $checkMail->fetch();
        if($mailExist != false) {
            echo "Email envoyé !";
        }
        else{
            echo "Aucun compte n'est associé à cette adresse mail.";
        }
    }
}