<?php 
require_once '../view/bootstrap.php';
App::getAuth()->logout();
App::redirect('login.php');