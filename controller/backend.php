<?php
require_once ('./model/Database.php');
require_once ('./model/PostManager.php');
require_once ('./model/CommentManager.php');
require_once ('./model/LoginManager.php');


function login($email, $password)
{
	$loginManager = new LoginManager();
	$user = $loginManager->login($email, $password);

	if ($user === false) {
		die("L'identifiant ou le mot de passe est incorrect");
	} else {
		header('Location: index.php?action=dashbord');
	}
}

function displayDashbord()
{
	require('./view/backend/dashbord.php');
}

function logout() 
{
    //setcookie('remember', NULL, -1);
    unset($_SESSION['admin']);
    header('location:index.php');
}