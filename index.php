<?php


require 'Routing.php';
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/CollectionController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

Routing::post('search', 'CollectionController');
Routing::get('output', 'CollectionController');\

Routing::get('editSet', 'DefaultController');
Routing::post('editSet', 'CollectionController');


Routing::post('updateSet', 'CollectionController');
Routing::post('deleteSet', 'CollectionController');
Routing::get('addSet', 'DefaultController');
Routing::post('addCollection','CollectionController');

Routing::get('usersList', 'SecurityController');
Routing::post('userAdminAction', 'SecurityController');
Routing::get('changePassword', 'DefaultController');
Routing::post('changePassword', 'SecurityController');

Routing::post('filterUserSets','CollectionController');
Routing::get('myAccount', 'DefaultController');
Routing::get('logout', 'SecurityController');


Routing::run($path);