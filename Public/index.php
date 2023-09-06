<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
// Inclusion des classes autres.
use App\Controller\RootController;

require_once dirname(__FILE__) . '/../Model/DB.php';
require_once dirname(__FILE__) . '/../Controller/AbstractController.php';
require_once dirname(__FILE__) . '/../Controller/RootController.php';
require_once dirname(__FILE__) . '/../Controller/HomeController.php';
require_once dirname(__FILE__) . '/../Controller/LoginController.php';

// Inclusion des entités.
require_once dirname(__FILE__) . '/../Model/Entity/Movies.php';
require_once dirname(__FILE__) . '/../Model/Entity/Review.php';
require_once dirname(__FILE__) . '/../Model/Entity/Comment.php';
require_once dirname(__FILE__) . '/../Model/Entity/Contact.php';
require_once dirname(__FILE__) . '/../Model/Entity/User.php';

// Inclusion des managers.
require_once dirname(__FILE__) . '/../Model/Manager/MoviesManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/ReviewManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/CommentManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/ContactManager.php';
require_once dirname(__FILE__) . '/../Model/Manager/UserManager.php';

// Inclusion des contrôleurs
require_once dirname(__FILE__) . '/../Controller/MoviesController.php';
require_once dirname(__FILE__) . '/../Controller/ReviewController.php';
require_once dirname(__FILE__) . '/../Controller/CommentController.php';
require_once dirname(__FILE__) . '/../Controller/ContactController.php';
require_once dirname(__FILE__) . '/../Controller/UserController.php';

// Inclusion du routeur.
require_once dirname(__FILE__) . '/router.php';
//route($_SERVER['REQUEST_URI']);
