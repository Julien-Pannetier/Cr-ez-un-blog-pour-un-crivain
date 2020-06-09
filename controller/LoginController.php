<?php
require_once ('./model/Database.php');
require_once ('./model/LoginManager.php');

class LoginController {

    public function __construct() {
        $this->loginManager = new LoginManager();
    }
    
    public function displayLogin() {
        require_once('./view/backend/login.php');
    }

    public function login($email, $password) {
        $user = $this->loginManager->login($email, $password);

        if (!$user) {
            $errorMessage = "Identifiant ou mot de passe incorrect";
            require_once('./view/backend/login.php');
        } else {
            header('Location: index.php?action=dashbord');
        }
    }

    public function displayDashbord() {
        require_once('./view/backend/dashbord.php');
    }

    public function logout() {
        session_destroy();
        header('location:index.php');
    }
}