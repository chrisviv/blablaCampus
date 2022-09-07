<?php

require_once 'dbConnect.php';
session_start();
    class dbFunction {
        function __construct {
            $db = new dbConnect();
        }
        function __desctruct() {

        }
        public function UserRegister($nom, $username, $password, $email, $bio){
            $password = password_hash($password);
        }
    }

?>