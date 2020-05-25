<?php
session_start();

require_once ('./controller/PostController.php');
require_once ('./controller/CommentController.php');
require_once ('./controller/LoginController.php');
require_once ('./helpers/RouterHelper.php');
require_once ('./helpers/functions.php');

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
                $id = RouterHelper::getId($_GET);
                $postController->getPost($id);
                break;

            case 'addComment':
                $id = RouterHelper::getId($_GET);
                if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) {
                    $commentController->addComment($id, $_POST['name'], $_POST['email'], $_POST['message']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
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
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $commentController->getReportComments();
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'posts':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $postController->getAllPosts();
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'addPost':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    if(!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                        $postController->addPost($_POST['title'], $_POST['content']);
                    }
                    require('./view/backend/addpost.php');
                    //$postController->displayAddPost();
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'displayUpdatePost':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $id = RouterHelper::getId($_GET);
                    $postController->displayUpdatePost($id);
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'updatePost':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    if (!empty($_POST) AND !empty($_POST['title']) AND !empty($_POST['content'])) {
                        $id = RouterHelper::getId($_GET);
                        $postController->updatePost($id, $_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'deletePost':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $id = RouterHelper::getId($_GET);
                    $postController->deletePost($id);
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'comments':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $commentController->getComments();
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'approveComment':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $id = RouterHelper::getId($_GET);
                    $commentController->approveComment($id);
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'displayUpdateComment':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $id = RouterHelper::getId($_GET);
                    $commentController->displayUpdateComment($id);
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'updateComment':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    if (!empty($_POST) AND !empty($_POST['comment'])) {
                        $id = RouterHelper::getId($_GET);
                        $commentController->updateComment($id, $_POST['comment']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    header('Location: index.php?action=login');
                }
                break;

            case 'deleteComment':
                if (array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == true) {
                    $id = RouterHelper::getId($_GET);
                    $commentController->deleteComment($_id);
                } else {
                    header('Location: index.php?action=login');
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