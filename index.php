<?php
require ('./controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    } else if ($_GET['action'] == 'post') {
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
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
} else {
    listPosts();
}