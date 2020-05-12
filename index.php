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
                $postController->getPosts();
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
                if (isset($_SESSION['admin'])) {
                    $commentController->getReportComments();
                }
                break;

            case 'posts':
                if (isset($_SESSION['admin'])) {
                    $postController->getAllPosts();
                }
                break;

            case 'addPost':
                if (isset($_SESSION['admin'])) {
                    if(!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                        $postController->addPost($_POST['title'], $_POST['content']);
                    }
                    $postController->displayAddPost();
                }
                break;

            case 'displayEditPost':
                if (isset($_SESSION['admin'])) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $postController->displayEditPost($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de chapitre envoyé !');
                    }
                }
                break;

            case 'editPost':
                if (isset($_SESSION['admin'])) {
                    if (!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                        $postController->editPost($_GET['id'], $_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                break;

            case 'deletePost':
                if (isset($_SESSION['admin'])) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $postController->deletePost($_GET['id']);
                    } else {
                        throw new Exception('Aucun identifiant de chapitre envoyé !');
                    }
                }
                break;

            case 'comments':
                if (isset($_SESSION['admin'])) {
                    $commentController->getAllComments();
                }
                break;

            case 'approveComment':
                if (isset($_SESSION['admin'])) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $commentController->approveComment($_GET['id']);
                    } else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                break;

            case 'displayEditComment':
                if (isset($_SESSION['admin'])) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $commentController->displayEditComment($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                break;

            case 'editComment':
                if (isset($_SESSION['admin'])) {
                    if (!empty($_POST) AND !empty($_POST['comment'])) {
                        $commentController->editComment($_GET['id'], $_POST['comment']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
                break;

            case 'deleteComment':
                if (isset($_SESSION['admin'])) {
                    if (isset($_GET['id']) AND $_GET['id'] > 0) {
                        $commentController->deleteComment($_GET['id']);
                    } else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                break;

            default:
                $postController->getPosts();
                break;
        }
    } else {
        $postController->getPosts();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
}