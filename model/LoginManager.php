<?php
class LoginManager extends Database {
  
    public function login($email, $password, $remember = false) {
        $query = 'SELECT * FROM admin WHERE email = ?';
        $user = $this->query($query, [$email])->fetch();

        if($user AND password_verify($password, $user->password)) {
            $_SESSION['admin'] = $user;
            return $user;
        } else {
            return false;
        }
    }
}