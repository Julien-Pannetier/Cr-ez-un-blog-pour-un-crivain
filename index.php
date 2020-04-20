<?php
session_start();
require ('./controller/frontend.php');
require ('./controller/backend.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    } 
    else if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) AND $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else if ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) AND $_GET['id'] > 0) {
            if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) {
                addComment($_GET['id'], $_POST['name'], $_POST['email'], $_POST['message']);
            }
            else {
                echo 'Erreur : Tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : Aucun identifiant de billet envoyé';
        }
    } 
    else if ($_GET['action'] == 'login') {
        if(!empty($_POST) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
            login($_POST['email'], $_POST['password']);
        }
        displayLogin();
    }
    else if ($_GET['action'] == 'dashbord') {
        if(isset($_SESSION['admin'])) {
            displayDashbord();
        }
        else {
            echo 'Erreur : Vous n\'avez pas le droit d\'accéder à cette page.';
            listPosts();
        }
    }

    else if ($_GET['action'] == 'logout') {
        logout();
    }
} else {
    listPosts();
}