<?php
class LoginManager extends Database {
  
    public function login($email, $password) {
        $query = 'SELECT * FROM admin WHERE email = :email';
        $db = $this->checkConnection();
        $req = $db->prepare($query);
        $req->bindParam("email", $email, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();
        if($user AND password_verify($password, $user['password'])) {
            $_SESSION['admin'] = true;
            return $user;
        } else {
            return false;
        }
    }
}