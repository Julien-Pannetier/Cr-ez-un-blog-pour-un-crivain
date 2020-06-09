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
                $page = RouterHelper::getPage($_GET);
                $postController->getPosts($page);
                break;

            case 'post':
                $id = RouterHelper::getId($_GET);
                $postController->getPost($id);
                break;

            case 'addComment':
                $id = RouterHelper::getId($_GET);
                $name = RouterHelper::getNameInPost($_POST);
                $email = RouterHelper::getEmailInPost($_POST);
                $message = RouterHelper::getMessageInPost($_POST);
                if(isset($name) && isset($email) && isset($message)) {
                    $commentController->addComment($id, $name, $email, $message);
                } else {
                    $errorMessage = 'Impossible d\'ajouter un commentaire !';
                }
                break;

            case 'reportComment':
                $commentId = RouterHelper::getCommentId($_GET);
                $postId = RouterHelper::getPostId($_GET);
                if(isset($commentId) && isset($postId)) {
                    $commentController->reportComment($commentId, $postId);  
                } else {
                    $errorMessage = 'Impossible de signaler ce commentaire !';
                }
                break;

            case 'login':
                $email = RouterHelper::getEmailInPost($_POST);
                $password = RouterHelper::getPasswordInPost($_POST);
                if(isset($email) && isset($password)) {
                    $loginController->login($email, $password);
                } else {
                    $loginController->displayLogin();                    
                }
                break;
            
            case 'logout':
                $loginController->logout();
                break;

            case 'dashbord':
                RouterHelper::checkAuthentication($_SESSION);
                $commentController->getReportComments();
                break;

            case 'posts':
                RouterHelper::checkAuthentication($_SESSION);
                $postController->getAllPosts();
                break;

            case 'addPost':
                RouterHelper::checkAuthentication($_SESSION);
                $title = RouterHelper::getTitleInPost($_POST);
                $content = RouterHelper::getContentInPost($_POST);
                if (isset($title) && isset($content)) {
                    $postController->addPost($title, $content);
                } else {
                    $postController->displayAddPost();
                }
                break;

            case 'displayUpdatePost':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);
                $postController->displayUpdatePost($id);
                break;

            case 'updatePost':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);                
                $title = RouterHelper::getTitleInPost($_POST);
                $content = RouterHelper::getContentInPost($_POST);
                if (isset($title) && isset($content)) {
                    $postController->updatePost($id, $title, $content);
                } else {
                    $errorMessage = 'Impossible de modifier ce chapitre !';
                }
                break;

            case 'deletePost':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);
                $postController->deletePost($id);
                break;

            case 'comments':
                RouterHelper::checkAuthentication($_SESSION);
                $commentController->getComments();
                break;

            case 'approveComment':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);
                $commentController->approveComment($id);
                break;

            case 'displayUpdateComment':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);
                $commentController->displayUpdateComment($id);
                break;

            case 'updateComment':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);
                $comment = RouterHelper::getCommentInPost($_POST);                
                if (isset($comment)) {
                    $commentController->updateComment($id, $comment);                    
                } else {
                    $errorMessage = 'Impossible de modifier ce commentaire !';
                }
                break;

            case 'deleteComment':
                RouterHelper::checkAuthentication($_SESSION);
                $id = RouterHelper::getId($_GET);
                $commentController->deleteComment($id);
                break;

            default:
                $page = RouterHelper::getPage($_GET);
                $postController->getPosts($page);
                //$postController->getPosts(0, 5);
                break;
        }
    } else {
        $page = RouterHelper::getPage($_GET);
        $postController->getPosts($page);
        //$postController->getPosts(0, 5);
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
}