<?php
session_start();
require ('./controller/frontend.php');
require ('./controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        else if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) AND $_GET['id'] > 0) {
                post($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé !');
            }
        }
        else if ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) AND $_GET['id'] > 0) {
                if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) {
                    addComment($_GET['id'], $_POST['name'], $_POST['email'], $_POST['message']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé !');
            }
        }
        else if ($_GET['action'] == 'reportComment') {
            if (isset($_GET['commentId']) AND $_GET['commentId'] > 0 AND isset($_GET['postId']) AND $_GET['postId'] > 0) {
                reportComment($_GET['commentId'], $_GET['postId']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé !');
            }
        }
        else if ($_GET['action'] == 'login') {
            if(!empty($_POST) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
                login($_POST['email'], $_POST['password']);
            }
            displayLogin();
        }
        else if ($_GET['action'] == 'logout') {
            logout();
        }
        else if(isset($_SESSION['admin'])) {
            if ($_GET['action'] == 'dashbord') {
                getReportComments();
            }
            else if ($_GET['action'] == 'posts') {
                getAllPosts();
            }
            else if ($_GET['action'] == 'addPost') {
                if(!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['content']);
            }
                displayAddPost();
            }        
            else if ($_GET['action'] == 'displayEditPost') {
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    displayEditPost($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            else if ($_GET['action'] == 'editPost') {
                if (!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                    editPost($_GET['id'], $_POST['title'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
             else if ($_GET['action'] == 'deletePost') {
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    deletePost($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            else if ($_GET['action'] == 'comments') {
                getAllComments();
            }
            else if ($_GET['action'] == 'approveComment') {
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    approveComment($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
                }
            }
            else if ($_GET['action'] == 'displayEditComment') {
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    displayEditComment($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
                }
            }
            else if ($_GET['action'] == 'editComment') {
                if (!empty($_POST) AND !empty($_POST['comment'])) {
                    editComment($_GET['id'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else if ($_GET['action'] == 'deleteComment') {
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    deleteComment($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
                }
            }
        } else {
            throw new Exception('Vous n\'avez pas le droit d\'accéder à cette page !');
            listPosts();
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
}