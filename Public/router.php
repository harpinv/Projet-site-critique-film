<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\RootController;

$router = new AltoRouter();

// Routes

$router->map('GET', '/home', 'HomeController#index', 'home');
$router->map('GET', '/', 'HomeController#index', 'root');
$router->map('GET', '/contactReceived', 'ContactController#contactReceived', 'contactReceived');
$router->map('POST', '/contactConfirmation', 'ContactController#newContact', 'contactConfirmation');
$router->map('GET', '/contact', 'ContactController#contact', 'contact');
$router->map('GET', '/deleteContact', 'ContactController#deleteContact', 'deleteContact');
$router->map('GET', '/identification', 'UserController#identification', 'identification');
$router->map('GET', '/error', 'UserController#error', 'error');
$router->map('GET', '/session', 'UserController#session', 'session');
$router->map('GET', '/biography', 'UserController#biography', 'biography');
$router->map('GET', '/movies', 'MoviesController#movies', 'movies');
$router->map('POST', '/research', 'MoviesController#research', 'research');
$router->map('POST', '/characteristic', 'MoviesController#characteristic', 'characteristic');
$router->map('GET', '/recordMovies', 'MoviesController#enter', 'record');
$router->map('POST', '/modifyMovies', 'MoviesController#modify', 'modifyMovies');
$router->map('POST', '/enterMovies', 'MoviesController#newMovies', 'enterMovies');
$router->map('POST', '/deleteMovies', 'MoviesController#deleteMovies', 'deleteMovies');
$router->map('POST', '/recordModifyMovies', 'MoviesController#modifyMovies', 'recordModifieMovies');
$router->map('POST', '/enterReview', 'ReviewController#enter', 'enterReview');
$router->map('POST', '/modifyReview', 'ReviewController#modify', 'modifyReview');
$router->map('POST', '/recordReview', 'ReviewController#newReview', 'recordReview');
$router->map('POST', '/deleteReview', 'ReviewController#deleteReview', 'deleteReview');
$router->map('POST', '/recordModifyReview', 'ReviewController#modifyReview', 'recordModifyReview');
$router->map('POST', '/recordComment', 'CommentController#newComment', 'recordComment');
$router->map('POST', '/deleteComment', 'CommentController#deleteComment', 'deleteComment');
$router->map('POST', '/controlUser', 'UserController#control', 'controlUser');
$router->map('GET', '/enterUser', 'UserController#enter', 'enterUser');
$router->map('POST', '/recordUser', 'UserController#newUser', 'recordUser');
$router->map('POST', '/validateUser', 'UserController#validate', 'validateUser');
$router->map('GET', '/users', 'UserController#users', 'users');

// Fonction

$match = $router->match();

if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    $controllerFile = dirname(__FILE__) . "/../Controller/$controller.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controllerClass = "App\\Controller\\$controller";
        $controllerInstance = new $controllerClass();
        call_user_func_array(array($controllerInstance, $action), $match['params']);
    } else {
        $rootController = new RootController();
        $rootController->displayError(404);
    }
} else {
    $rootController = new RootController();
    $rootController->displayError(404);
}
