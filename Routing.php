<?php

require_once './src/controllers/DefaultController.php';
require_once './src/controllers/SecurityController.php';
require_once './src/controllers/CollectionController.php';

class Routing{

    public static $routes;

    public static function get($url, $controller){
        self::$routes[$url] = $controller;

    } 

    public static function post($url, $controller){
        self::$routes[$url] = $controller;

    }


    public static function run($url){
        session_start();
        $action = explode("/", $url)[0];

        if(empty($action)){
            $action = 'index';
        }else if(!array_key_exists($action, self::$routes)){
            die("Wrong URL!");
        }

        $controller = self::$routes[$action];
        $protectedRoutes = ['changePassword', 'myAccount', 'editSet', 'addSet','changePassword','logout','updateSet','deleteSet'];
        $adminRoutes = ['usersList','switchRole'];

        if (in_array($action, $protectedRoutes)) {
            if (isset($_SESSION['user_id'])) {
                $pdo = (new Database())->getConnection();
                $stmt = $pdo->prepare('select * from users where username = :username');
                $stmt->bindParam(':username', $_SESSION['user_id'], PDO::PARAM_INT);
                $stmt->execute();
                $user = $stmt->fetch();

                if (!$user) {
                    session_destroy();
                    header("Location: login");
                    exit();
                }
                if(in_array($action, $adminRoutes)){
                    if ($user['is_admin'] == 0) {
                        exit();
                    }
                }
            }
        }

        $object = new $controller;
        $object->$action();

    }

}