<?php
session_start();

require_once ('./controller/PostController.php');
require_once ('./controller/CommentController.php');
require_once ('./controller/LoginController.php');

$postController = new PostController();
$commentController = new CommentController();
$loginController = new LoginController();

try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'getPosts':
                $postController->getPosts(0, 5);
                break;

            case 'post':
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    $postController->getPost($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }

            case 'addComment':
                if (isset($_GET['id']) AND $_GET['id'] > 0) {
                    if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) {
                        $commentController->addComment($_GET['id'], $_POST['name'], $_POST['email'], $_POST['message']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                else {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
                break;

            case 'reportComment':
                if (isset($_GET['commentId']) AND $_GET['commentId'] > 0 AND isset($_GET['postId']) AND $_GET['postId'] > 0) {
                    $commentController->reportComment($_GET['commentId'], $_GET['postId']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
                }
                break;

            case 'login':
                if (!empty($_POST) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
                    $loginController->login($_POST['email'], $_POST['password']);
                }
                $loginController->displayLogin();
                break;
            
            case 'logout':
                $loginController->logout();
                break;

            case 'dashbord':
                if ($_SESSION['admin'] === true) {
                    $commentController->getReportComments();
                }
                break;

            case 'posts':
                if ($_SESSION['admin'] === true) {
                    $postController->getAllPosts();
                }
                break;

            case 'addPost':
                if ($_SESSION['admin'] === true) {
                    if(!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                        $postController->addPost($_POST['title'], $_POST['content']);
                    }
                    $postController->displayAddPost();
                }
                break;

            case 'displayUpdatePost':
                if ($_SESSION['admin'] === true) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $postController->displayUpdatePost($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de chapitre envoyé !');
                    }
                }
                break;

            case 'updatePost':
                if ($_SESSION['admin'] === true) {
                    if (!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                        $postController->updatePost($_GET['id'], $_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                break;

            case 'deletePost':
                if ($_SESSION['admin'] === true) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $postController->deletePost($_GET['id']);
                    } else {
                        throw new Exception('Aucun identifiant de chapitre envoyé !');
                    }
                }
                break;

            case 'comments':
                if ($_SESSION['admin'] === true) {
                    $commentController->getComments();
                }
                break;

            case 'approveComment':
                if ($_SESSION['admin'] === true) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $commentController->approveComment($_GET['id']);
                    } else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                break;

            case 'displayUpdateComment':
                if ($_SESSION['admin'] === true) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $commentController->displayUpdateComment($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                break;

            case 'updateComment':
                if ($_SESSION['admin'] === true) {
                    if (!empty($_POST) AND !empty($_POST['comment'])) {
                        $commentController->updateComment($_GET['id'], $_POST['comment']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                break;

            case 'deleteComment':
                if ($_SESSION['admin'] === true) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $commentController->deleteComment($_GET['id']);
                    } else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                break;

            default:
                $postController->getPosts(0, 5);
                break;
        }
    } else {
        $postController->getPosts(0, 5);
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
}