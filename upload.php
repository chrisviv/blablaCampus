<?php

$currentDirectory = getcwd();
$uploadDirectory = "assets/avatars";

$errors = [];

$fileExtensionsAllowed = ['gif', 'jpg', 'png'];

$fileName = $_FILES['profilePic']['name'];
$fileSize = $_FILES['profilePic']['size'];
$fileTmpName = $_FILES['profilePic']['tmp_name'];
$fileType = $_FILES['profilePic']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));

$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

if(isset($_POST['submit'])) {
    if (! in_array($fileExtension, $fileExtensionsAllowed)) {
        $errors[] = "L'extension de ce fichier n'est pas autorisée ! Merci d'utiliser des fichiers 'JPG', 'PNG' ou 'GIF'.";
    }
    if ($fileSize > 10000000) {
        $errors[] = "Ce fichier est trop volumineux ! (10MB maximum)";
    }
    
    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    
        if ($didUpload) {
            echo "Le fichier " . basename($fileName) . " a été téléchargé !";
        }
        else {
            echo "Un problème est survenu lors du téléchargement !";
        }
    }
    else {
        foreach ($errors as $error) {
            echo $error . "Voici les problèmes" . "\n";
        }
    }
}



// Autre version

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['profilePic']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['profilePic']['tmp_name']);
    if($check !== false) {
        echo "Fichier trop volumineux - " . $check['mime'] . ".";
        $uploadOk = 1;
    }
    else {
        echo "Ce fichier n'est pas une image.";
        $uploadOk = 0;
    }
}



?>