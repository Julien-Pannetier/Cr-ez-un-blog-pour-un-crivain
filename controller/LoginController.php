<?php
require_once ('./model/Database.php');
require_once ('./model/LoginManager.php');

class LoginController {

    public function __construct() {
        $this->loginManager = new LoginManager();
    }
    
    public function displayLogin() {
        require('./view/backend/login.php');
    }

    public function login($email, $password) {
        $user = $this->loginManager->login($email, $password);

        if ($user === false) {
            throw new Exception('L\'identifiant ou le mot de passe est incorrect');
        } else {
            header('Location: index.php?action=dashbord');
        }
    }

    public function displayDashbord() {
        require('./view/backend/dashbord.php');
    }

    public function logout() {
        unset($_SESSION['admin']);
        header('location:index.php');
    }
}