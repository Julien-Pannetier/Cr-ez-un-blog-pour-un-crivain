<?php
class LoginManager extends Database {
  
    public function login($email, $password, $remember = false) {
        $query = 'SELECT * FROM admin WHERE email = ?';
        $user = $this->query($query, [$email])->fetch();

        if($user AND password_verify($password, $user->password)) {
            $_SESSION['admin'] = $user;
            //if($remember) {
            //    $this->remember($user->id);
            //}
            return $user;
        } else {
            return false;
        }
    }


    //public function remember($user_id) {
    //    $pool = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    //    $remember_token = substr(str_shuffle(str_repeat($alphabet, 255)), 0, 255);
    //    $query = 'UPDATE admin SET remember_token = ? WHERE id = ?';
    //    $data = $this->query($query, [$remember_token, $user_id]);
    //    setcookie('remember', $user_id . '==' . $remember_token, time() + 60*60*24*7 );
    //}
}