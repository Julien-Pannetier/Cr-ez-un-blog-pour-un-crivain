<?php
require_once ('./model/Database.php');
require_once ('./model/LoginManager.php');

class LoginController {

    public function __construct() {
        $this->loginManager = new LoginManager();
    }
    
    public function displayLogin() {
        require_once('./view/frontend/login.php');
    }

    public function login($email, $password) {
        $user = $this->loginManager->login($email, $password);

        if (!$user) {
            Functions::flash('Identifiant / mot de passe incorrect !', 'error');
            require_once('./view/frontend/login.php');
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