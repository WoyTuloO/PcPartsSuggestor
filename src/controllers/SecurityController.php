<?php


use App\Repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__.'/../Models/User.php';
require_once __DIR__.'/../Repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        session_start();

        $repo = new UserRepository();


        if(!$this->isPost())
        {
            return $this->render('login-page', []);
        }

        $login = $_POST['username'];
        $password = $_POST['password'];


        if(empty($login) || empty($password)){
            return $this->render('login-page', ['message' => ['Wypełnij wszystkie pola']]);
        }

        $user = $repo->getUser($login);

        if(!$user){
            return $this->render('login-page', ['message' => ['Użytkownik o podanych danych logowania nie istnieje!']]);
        }

        if($user->getUsername() !== $login || password_verify($user->getPassword(), $password) )
        {
            return $this->render('login-page', ['message' => ['Niepoprawny login lub hasło']]);
        }



        $_SESSION['user_id'] = $user->getUsername();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['is_admin'] = $user->getIsAdmin();

        header("Location: /index");
        exit;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /login");
        exit;
    }



    public function register()
    {
        $repo = new UserRepository();


        if(!$this->isPost())
        {
            return $this->render('register-page', []);
        }

        $login = $_POST['username'];
        $password = $_POST['password'];

        $user = $repo->addUser($login, $password);

        if(!$user){
            return $this->render('register-page', ['message' => ['Taki użytkownik już istnieje']]);
        }

        return $this->render('login-page', ['successMessage' => ['Konto zostało utworzone!','Zaloguj się.']]);
    }

    public function changePassword()
    {
        session_start();

        $repo = new UserRepository();

        if(!$this->isPost())
        {
            return $this->render('change-password-page', []);
        }

        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $newPassword2 = $_POST['newPassword2'];

        $user = $repo->getUser($_SESSION['user_id']);

        if(password_verify($user->getPassword(), $oldPassword))
        {
            return $this->render('change-password-page', ['message' => ['Niepoprawne hasło']]);
        }

        if($newPassword !== $newPassword2)
        {
            return $this->render('change-password-page', ['message' => ['Hasła nie są takie same']]);
        }

        $repo->updateUser($user->getUsername(), $newPassword);

        return $this->render('change-password-page', ['message' => ['Hasło zostało zmienione']]);
    }

    public function usersList()
    {
        session_start();

        $repo = new UserRepository();

        $users = $repo->getAllUsers();

        $this->render('users-list-page', ['result' => $users]);
    }

    public function switchRole(){
        session_start();

        $repo = new UserRepository();

        $username = $_POST['username'];

        $user = $repo->getUser($username);

        if($user->getIsAdmin() == 1){
            $repo->makeUser($username);
        }else{
            $repo->makeAdmin($username);
        }

        $users = $repo->getAllUsers();

        $this->render('users-list-page', ['result' => $users]);
    }

    public function userAdminAction()
    {
        session_start();

        $repo = new UserRepository();

        $username = $_POST['username'];
        $action = $_POST['action'];


        if($action === 'delete'){
            $repo->deleteUser($username);
        }else{
            $user = $repo->getUser($username);

            if($user->getIsAdmin() == 1){
                $repo->makeUser($username);
            }else{
                $repo->makeAdmin($username);
            }
        }

        header("Location: /usersList");

    }



    private function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

}